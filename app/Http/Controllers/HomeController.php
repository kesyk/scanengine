<?php

namespace App\Http\Controllers;

use App\Messaging\RabbitMQPublisher;
use App\Messaging\RmqAmazonSearchesConsumer;

class HomeController extends Controller
{
    public function index()
    {

//        $publisher = new RabbitMQPublisher();
//
//        $publisher->publish("sex");
//
//        $publisher->closeConnection();
//
//        $consumer = new RmqAmazonSearchesConsumer();
//        $consumer->consume();

        return view("main.index");
    }

}
