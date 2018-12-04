<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*App bindings*/
use Illuminate\Container\Container;

$container = Container::getInstance();
$container->singleton(\App\Messaging\RabbitMQPublisher::class);
$container->singleton(\App\Services\UploadService::class);
$container->singleton(\App\Services\ISearchService::class, \App\Services\AmazonSearchService::class);
$container->singleton(\App\Messaging\RmqAmazonSearchesConsumer::class);


Route::get('/', "HomeController@index")->name('home');
Route::get('upload', "UploadController@index")->name('upload');

Route::post('upload', "UploadController@uploadFileToDisk")->name('uploadscanfile');
Route::post('search', "UploadController@uploadFileToDb")->name('search');
