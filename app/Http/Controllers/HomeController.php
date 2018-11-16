<?php

namespace App\Http\Controllers;

use App\Jobs\SearchProcessor;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

            $client = new Client();
            $client->get(route('start'), [
                'headers' => [
                    'X-CSRF-Token' => csrf_token()
                ]
            ]);

            return view("main.index");


    }

}
