<?php

namespace App\Tools;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ProductTableCreator
{
    private $tableName;

    public function __construct($t_tableName)
    {
        $this->tableName = self::getTablePrefix().$t_tableName;
    }

    public function up()
    {
        if(!$this->isExist())
        {
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->increments('id');
                $table->string('hashedname');
                $table->string('upc')->nullable();
                $table->double('price')->nullable();
                $table->string('asin')->nullable();
                $table->string('image')->nullable();
                $table->string('url')->nullable();
                $table->integer('quantity')->nullable();
                $table->double('salesrank')->nullable();
                $table->string('title')->nullable();
                $table->string('brand')->nullable();
                $table->string('atitle')->nullable();
                $table->integer('packagequantity')->nullable();
                $table->double('aboxprice')->nullable();
                $table->integer('newoffers')->nullable();
                $table->string('category')->nullable();
                $table->double('fbafee')->nullable();
                $table->double('reffee')->nullable();
                $table->double('varclosingfee')->nullable();
                $table->double('shippingcost')->nullable();
                $table->double('profit')->nullable();
                $table->double('roi')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('scans');
    }

    private function isExist()
    {
        return Schema::hasTable($this->tableName);
    }

    public static function getTablePrefix()
    {
        return "upload_";
    }

}
