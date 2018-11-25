<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 25.11.2018
 * Time: 1:59
 */

namespace App\Models;


class UserMatch
{
    public $title;
    public $upc;
    public $asin;
    public $price;
    public $image;
    public $note;
    public $quantity;
    public $url;

    public function __construct($userMatch)
    {
        $this->title = $userMatch->title;
        $this->upc = $userMatch->upc;
        $this->asin = $userMatch->asin;
        $this->price = $userMatch->price;
        $this->image = $userMatch->image;
        $this->note = $userMatch->note;
        $this->quantity = $userMatch->quantity;
        $this->url = $userMatch->url;
    }
}