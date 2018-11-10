<?php

namespace App\Http\Controllers;

use App\Enums\ProgressType;
use App\ScanModel;
use App\Tools\ScansTableCreator;
use Illuminate\Support\Facades\File;
use Jenky\LaravelPlupload\Facades\Plupload;

class UploadController extends Controller
{
    public function upload(File $file)
    {
        $scanTableCreator = new ScansTableCreator("test1");
        $scanTableCreator->up();
        $scanTable = new ScanModel("scans_test1");
        $scanTable->originalname="set";
        $scanTable->hashedname="set";
        $scanTable->linescount=10;
        $scanTable->checked=120;
        $scanTable->added=121;
        $scanTable->progresstype=0;
        $scanTable->ended_at=date("Y-m-d H:i:s");

        $scanTable->save();

        return Plupload::file('file', function($file) {
            // Store the uploaded file using storage disk
            //$path = Storage::disk('local')->putFile('uploads', $file);
            // Save the record to the db


            // This will be included in JSON response result
            return [
                'success' => true,
                'message' => var_dump($file),
                // 'url' => $photo->getImageUrl($filename, 'medium'),
                // 'deleteUrl' => route('photos.destroy', $photo)
                // ...
            ];
        });
    }

    public function matchUpload(File $file)
    {
        return Plupload::file('file', function($file) {


            // This will be included in JSON response result
            return [
                'success' => true,
                'message' => 'Upload successful.',
                // 'url' => $photo->getImageUrl($filename, 'medium'),
                // 'deleteUrl' => route('photos.destroy', $photo)
                // ...
            ];
        });
    }
}
