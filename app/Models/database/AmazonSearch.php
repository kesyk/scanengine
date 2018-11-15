<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmazonSearch extends Model
{
    protected $fillable = [
        'originalname',
        'hashedname',
        'linescount',
        'checked',
        'added',
        'progresstype',
        'ended_at',
    ];
}
