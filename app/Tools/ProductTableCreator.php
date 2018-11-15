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
                $table->string('originalname');
                $table->string('hashedname');
                $table->integer('linescount');
                $table->integer('checked');
                $table->integer('added');
                $table->integer('progresstype');
                $table->timestamp('ended_at');
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
