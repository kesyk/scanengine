<?php

interface ISearchService {
    public function startSearch($searchId);
    public function stopSearch($searchId);
}