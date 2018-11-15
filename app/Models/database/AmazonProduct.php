<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmazonProduct extends Model
{
    protected $table;
    protected $fillable = [
        'originalname',
        'hashedname',
        'linescount',
        'checked',
        'added',
        'progresstype',
        'ended_at',
    ];

    public function __construct($tableName, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = $tableName;
    }

}
