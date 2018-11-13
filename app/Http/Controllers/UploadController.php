<?php

namespace App\Http\Controllers;

use App\Enums\ProgressType;
use App\ScanModel;
use App\Tools\ScansTableCreator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Jenky\LaravelPlupload\Facades\Plupload;

class UploadController extends Controller
{
    public function index()
    {
        return view('main.upload');
    }

    public function upload()
    {
//        $scanTableCreator = new ScansTableCreator("test1");
//        $scanTableCreator->up();
//        $scanTable = new ScanModel("scans_test1");
//        $scanTable->originalname="set";
//        $scanTable->hashedname="set";
//        $scanTable->linescount=10;
//        $scanTable->checked=120;
//        $scanTable->added=121;
//        $scanTable->progresstype=0;
//        $scanTable->ended_at=date("Y-m-d H:i:s");
//
//        $scanTable->save();

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
        }

        die('{"OK": 1, "info": "Upload successful."}');
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
