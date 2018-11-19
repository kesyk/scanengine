<?php

namespace App\Http\Controllers;

use App\AmazonSearch;
use App\Jobs\SearchProcessor;
use Bschmitt\Amqp\Amqp;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rabbitClient = new Amqp();
        $rabbitClient->publish('routing-key', 'message' , ['queue' => 'searches']);
        return view("main.index");
    }

}
