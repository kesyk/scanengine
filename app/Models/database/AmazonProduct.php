<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmazonProduct extends Model
{
    protected $table;
    protected $fillable = [
        'id',
        'hashedname',
        'upc',
        'price',
        'asin',
        'salesrank',
        'title',
        'brand',
        'atitle',
        'packagequantity',
        'aboxprice',
        'newoffers',
        'category',
        'fbafee',
        'reffee',
        'varclosingfee',
        'shippingcost',
        'profit',
        'roi',
    ];
    public function __construct($tableName, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = $tableName;
    }

}
