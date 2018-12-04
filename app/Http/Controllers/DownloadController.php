<?php

namespace App\Http\Controllers;

use App\ServicesImpl\DownloadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DownloadController extends Controller
{
    private $downloadService;

    public function __construct(DownloadService $downloadService)
    {
        $this->downloadService = $downloadService;
    }

    public function download(Request $request)
    {
        try {
//            if (!file_exists($request->productTable))
//                throw new Exception("File doesn't exist");
//            if (!Schema::hasTable($request->productTable))
//                throw new Exception("Nothing to download");

            $result = $this->downloadService->download('');

            if($result == '')
                throw new Exception("File has not downloaded");

            return response()->download($result, basename($result))->deleteFileAfterSend(true);

        } catch (Exception $ex)
        {
            return response($ex->getMessage(), 400);
        }

    }

}
