<?php

namespace App\Http\Controllers;

use App\Models\UserMatch;
use App\ServicesImpl\UploadService;
use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    private  $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        return view('main.upload');
    }

    public function uploadFileToDisk()
    {
        try{
            return $this->uploadService->uploadFileToDisk();
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

            $this->uploadService->uploadFileToDb($userMatch, $fileName);
        }
        catch (Exception $ex)
        {
            return response($ex->getMessage(), 400);
        }
    }
}
