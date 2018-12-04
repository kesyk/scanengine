<?php

namespace App\Services;

interface ISearchService {
    public function startSearch($searchHash);
    public function stopSearch();
}