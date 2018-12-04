<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 04.12.2018
 * Time: 21:52
 */

namespace App\ServicesImpl;


use App\Services\IDownloadService;
use Box\Spout\Common\Type;
use Box\Spout\Writer\WriterFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DownloadService implements IDownloadService
{
    public function download($productTableName){
        $fileTempPath = Storage::disk('download')->getAdapter()->getPathPrefix().'products_'.date("Y-m-d_H-i-s").'.xlsx';

        $writer = $this->createFile($fileTempPath);

        $productsTable = DB::table($productTableName);

        $productTableColumns = array_slice(Schema::getColumnListing($productTableName), 2);
        $writer->addRow($productTableColumns);

        $productsTable
            ->orderBy('id')
            ->chunk(1000, function($data) use($writer) {
                $prepearedRows = array();
                for ($i = 0; $i < sizeof($data); $i++)
                    $prepearedRows[] = array_slice((array)$data[$i], 2);

                $writer->addRows($prepearedRows);
            });

        $writer->close();

        return $fileTempPath;
    }

    private function createFile($filePath){
        $handler = fopen($filePath, "w");
        fclose($handler);

        $writer = WriterFactory::create(Type::XLSX);
        $writer->openToFile($filePath);

        return $writer;
    }
}