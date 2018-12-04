<?php

namespace App\Services;

interface ISearchService {
    function startSearch($searchHash);
    function stopSearch();
}