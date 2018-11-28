<?php

namespace App\Http\Controllers;

use App\Models\UserMatch;
use App\Services\UploadService;
use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('main.upload');
    }

    public function uploadFileToDisk()
    {
        try{
            $uploadService = new UploadService();

            return $uploadService->uploadFileToDisk();
        }
        catch (Exception $ex)
        {
            return response($ex->getMessage(), 400);
        }
    }

    public function uploadFileToDb(Request $request)
    {
        try{
            $userMatch = new UserMatch((object)$request->productData);
            $fileName = ((object)$request->fileName)->scalar;

            $uploadService = new UploadService();

            $uploadService->uploadFileToDb($userMatch, $fileName);
        }
        catch (Exception $ex)
        {
            return response($ex->getMessage(), 400);
        }
    }
}
