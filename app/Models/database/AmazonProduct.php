<?php

namespace App\Models\Database;

use App\Models\MatchedResult;
use Illuminate\Database\Eloquent\Model;

class AmazonProduct extends Model
{
    protected $table;

    public function __construct($tableName, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = "upload_".$tableName;
    }

    public function setupProductByUserMatch(MatchedResult $matchedIndexes, $fileRow, $hashedName){
        $this->hashedname = $hashedName;

        if($matchedIndexes->titleIndex)
            $this->title = $fileRow[$matchedIndexes->titleIndex];
        if($matchedIndexes->priceIndex)
            $this->price = $fileRow[$matchedIndexes->priceIndex];
        if($matchedIndexes->asinIndex)
            $this->asin = $fileRow[$matchedIndexes->asinIndex];
        if($matchedIndexes->upcIndex)
            $this->upc = $fileRow[$matchedIndexes->upcIndex];
        if($matchedIndexes->quantityIndex)
            $this->quantity = $fileRow[$matchedIndexes->quantityIndex];
        if($matchedIndexes->urlIndex)
            $this->url = $fileRow[$matchedIndexes->urlIndex];
        if($matchedIndexes->imageIndex)
            $this->image = $fileRow[$matchedIndexes->imageIndex];
    }

    public function getArrayData()
    {
        return array(
            "hashedname" => $this->hashedname,
            "title" => $this->title,
            "price" => $this->price,
            "asin" => $this->asin,
            "upc" => $this->upc,
            "quantity" => $this->quantity,
            "url" => $this->url,
        );
    }

    public function getTableName()
    {
        return $this->table;
    }


}
