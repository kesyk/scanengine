<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 25.11.2018
 * Time: 3:12
 */

namespace App\ServicesImpl;

use App\AmazonSearch;
use App\Enums\ProgressType;
//use App\Messaging\RabbitMQPublisher;
use App\Models\Database\AmazonProduct;
use App\Models\MatchedResult;
use App\Models\UserMatch;
use App\Services\IUploadService;
use App\Tools\ProductTableCreator;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Exception;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadService implements IUploadService
{
    private $rabbitMQPublisher;

    public function __construct(/*RabbitMQPublisher $rabbitMQPublisher*/)
    {
//        $this->rabbitMQPublisher = $rabbitMQPublisher;
    }

    public function uploadFileToDb(UserMatch $userMatch, $fileName){
        try{
            $fileFullName = Storage::disk('upload')->getAdapter()->getPathPrefix().'/'.$fileName;

            #region Validation

            if($userMatch == null)
                throw new Exception("Columns are not filled");

            if($userMatch->upc == 'none' &&
                $userMatch->asin == 'none' &&
                $userMatch->title == 'none')
                throw new Exception("Main fields are not filled. Please fill ASIN, UPS or Title column in mathing section");

            $existedSearch = DB::table("searches")
                ->where('originalname', $fileName)
                ->first();

            if($existedSearch != null &&
                ($existedSearch->progresstype == ProgressType::FAILED ||
                $existedSearch->progresstype == ProgressType::NEW))
            {
                $this->rabbitMQPublisher->publish($existedSearch->hashedname);
                return response(array("type" => "success", "message" => "Search request has sent"));
            }

            if($existedSearch &&
                ($existedSearch->progresstype == ProgressType::COMPLETED ||
                $existedSearch->progresstype == ProgressType::IN_PROCESS))
                throw new Exception("This search is exists");

            #endregion

            $hashedName = Uuid::uuid();

            $productTableCreator = new ProductTableCreator($hashedName);
            $productTableCreator->up();

            $fileColumnsNames = $this->getColumnsNamesOfFile($fileFullName);
            $matchedIndexes = $this->getIndexesOfDefaultColumns($userMatch, $fileColumnsNames);

            $data = array();
            $linesAmount = 0;
            $pageSize = 50;
            $rowProcessed = 0;
            $product = new AmazonProduct($hashedName);

            $reader = ReaderFactory::create($this->getFileExtensionType($fileName));
            $reader->open($fileFullName);



            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    if($row == $fileColumnsNames)
                        continue;

                    $product->setupProductByUserMatch($matchedIndexes, $row, $hashedName);
                    array_push($data, $product->getArrayData());

                    if($rowProcessed > $pageSize)
                    {
                        DB::table($product->getTableName())->insert($data);
                        $rowProcessed=0;
                        $data = array();
                        break;
                    }
                    $rowProcessed++;
                    $linesAmount++;
                }
                break;
            }

            $reader->close();

            $search = new AmazonSearch();

            $search->originalname = "{$fileName}";
            $search->hashedname = "{$hashedName}";
            $search->linescount = $linesAmount;
            $search->checked = 0;
            $search->added = $linesAmount;
            $search->progresstype = ProgressType::NEW;

            $search->save();

//            $this->rabbitMQPublisher->publish($hashedName);

            return response(array("type" => "success", "message" => "Search process has started"));
        }
        catch (Exception $ex)
        {
            throw new Exception("Failed upload file data to database. {$ex->getMessage()}");
        }
    }

    public function uploadFileToDisk(){
        $uploadedFileFullPath = $this->startFileUploading();

        if ($uploadedFileFullPath != '')
        {
            return response($this->getColumnsOfFile($uploadedFileFullPath));
        }
    }

    public function getColumnsOfFile($fullPath)
    {
//        $chunkReader = new ExcelChunkReader($fullPath);
//        /**  Create a new Reader of the type defined in $inputFileType  **/
//        $filter = new ExcelChunkFilter();
//        $fileType = IOFactory::identify($fullPath);
//        $reader = IOFactory::createReader($fileType);
//
//        /**  Define how many rows we want to read for each "chunk"  **/
//        $chunkSize = 10;
//        /**  Create a new Instance of our Read Filter  **/
//
//        /**  Tell the Reader that we want to use the Read Filter  **/
//        $reader->setReadFilter($filter);
//        $reader->setReadDataOnly(true);
//        $reader->setReadEmptyCells(false);
//        /**  Loop to read our worksheet in "chunk size" blocks  **/
//        for ($startRow = 2; $startRow <= 65536; $startRow += $chunkSize) {
//            /**  Tell the Read Filter which rows we want this iteration  **/
//            $filter->setRows($startRow, $chunkSize);
//            /**  Load only the rows that match our filter  **/
//            $spreadsheet = $reader->load($fullPath);
//        }



        $reader = ReaderFactory::create($this->getFileExtensionType($fullPath));
        //todo
        $headerColumns=array();

        $reader->open($fullPath);
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $headerColumns = sizeof($row) == 1 ? explode(";", $row[0]) : $row;
                break;
            }
            break;
        }
        $reader->close();

        return $headerColumns;
    }

    #region helpers
    private function startFileUploading()
    {
        try{
            if (empty($_FILES) || $_FILES['file']['error']) {
                return '';
            }

            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

            $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
            $filePath = Storage::disk('upload')->getAdapter()->getPathPrefix().$fileName;

            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = @fopen($_FILES['file']['tmp_name'], "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    return '';

                @fclose($in);
                @fclose($out);

                @unlink($_FILES['file']['tmp_name']);
            } else
                return '';


            if (!$chunks || $chunk == $chunks - 1) {
                // Strip the temp .part suffix off
                rename("{$filePath}.part", $filePath);

                return $filePath;
            }
        }
        catch (Exception $ex)
        {
            throw new Exception("Failed to load file to disk");
        }
    }

    private function getIndexesOfDefaultColumns(UserMatch $userMatch, array $columnsNames)
    {
        $matchedResult = new MatchedResult();

        $matchedResult->titleIndex = array_search($userMatch->title, $columnsNames);
        $matchedResult->asinIndex = array_search($userMatch->asin, $columnsNames);
        $matchedResult->imageIndex = array_search($userMatch->image, $columnsNames);
        $matchedResult->priceIndex = array_search($userMatch->price, $columnsNames);
        $matchedResult->upcIndex = array_search($userMatch->upc, $columnsNames);
        $matchedResult->urlIndex = array_search($userMatch->url, $columnsNames);
        $matchedResult->quantityIndex = array_search($userMatch->quantity, $columnsNames);

        return $matchedResult;
    }
    private function getFileExtensionType($fileName)
    {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        switch (strtolower($ext))
        {
            case 'csv':
                return Type::CSV;

            case 'xlsx':
            case 'xls':
                return Type::XLSX;

            default:
                return false;
        }

    }
    private function convertXlsToXlsxIfNeeded($filePath)
    {
//        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
//
//        if($ext != "xls")
//            return $filePath;
//
//        $spreadsheet = IOFactory::createReader("Excel2003XML");
//        $reader = $spreadsheet->load($filePath);
//        $writer = new Xlsx($reader);
//
//        $newFilePath = str_replace(".xls",".xlsx", $filePath);
//        $writer->save($newFilePath);
//
//        unlink($filePath);
//
//        return $newFilePath;

    }

    #endregion
}