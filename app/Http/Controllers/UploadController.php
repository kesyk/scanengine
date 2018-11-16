<?php

namespace App\Http\Controllers;

use App\AmazonSearch;
use App\Jobs\SearchProcessor;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('main.upload');
    }

    public function upload()
    {
        $uploadedFile = $this->uploadFileToDisk();
        if ($uploadedFile != '')
        {
            $reader = ReaderFactory::create(Type::XLSX);
            $reader->open($uploadedFile);
            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    $headerColumns = $row;
                    break;
                }
                break;
            }
            $reader->close();

            return response($headerColumns);
        }
    }

    public function createSearch(Request $request)
    {
        $userMatch = (object)$request->productData;
        $fileName = (object)$request->fileName;

        #region Validation

        if($userMatch == null)
            response(array("type" => "error", "message" => "Columns are not filled"));

        if($userMatch->upc == 'none' &&
            $userMatch->asin == 'none' &&
            $userMatch->title == 'none')
            response(array("type" => "error", "message" => "Main fields are not filled. Please fill ASIN, UPS or Title column in mathing section"));

        #endregion

        $search = new AmazonSearch();
        $search->originalname = $fileName;
        $search->hashedname = md5($search->id.$fileName->name);
    }

    private function uploadFileToDisk()
    {
        if (empty($_FILES) || $_FILES['file']['error']) {
            die('{"OK": 0, "info": "Failed to move uploaded file."}');
        }

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
        $filePath = Storage::disk('local')->getAdapter()->getPathPrefix().'/'.$fileName;

        // Open temp file
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
        if ($out) {
            // Read binary input stream and append it to temp file
            $in = @fopen($_FILES['file']['tmp_name'], "rb");

            if ($in) {
                while ($buff = fread($in, 4096))
                    fwrite($out, $buff);
            } else
                die('{"OK": 0, "info": "Failed to open input stream."}');

            @fclose($in);
            @fclose($out);

            @unlink($_FILES['file']['tmp_name']);
        } else
            die('{"OK": 0, "info": "Failed to open output stream."}');


// Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);

            return $filePath;
        }
    }

    public function start()
    {

        $bgWork = new SearchProcessor();

        $this->dispatch($bgWork);

    }
}
