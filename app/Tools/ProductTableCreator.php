<?php

namespace App\Tools;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ProductTableCreator
{
    private $tableName;

    public function __construct($t_tableName)
    {
        $this->tableName = 'upload_'.$t_tableName;
    }

    public function up()
    {
        if(!$this->isExist())
        {
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->increments('id');
                $table->string('hashedname');
                $table->string('upc');
                $table->double('price');
                $table->string('asin');
                $table->double('salesrank');
                $table->string('title');
                $table->string('brand');
                $table->string('atitle');
                $table->integer('packagequantity');
                $table->double('aboxprice');
                $table->integer('newoffers');
                $table->string('category');
                $table->double('fbafee');
                $table->double('reffee');
                $table->double('varclosingfee');
                $table->double('shippingcost');
                $table->double('profit');
                $table->double('roi');
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

}
