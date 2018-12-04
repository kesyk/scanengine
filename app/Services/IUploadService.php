<?php

namespace App\Services;

use App\Models\UserMatch;

interface IUploadService {
    function uploadFileToDb(UserMatch $userMatch, $fileName);
    function uploadFileToDisk();
    function getColumnsOfFile($fullPath);
}