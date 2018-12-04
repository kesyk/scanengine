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
$container->singleton(\App\Services\IUploadService::class,\App\ServicesImpl\UploadService::class);
$container->singleton(\App\Services\IDownloadService::class,\App\ServicesImpl\DownloadService::class);
$container->singleton(\App\Services\ISearchService::class, \App\ServicesImpl\AmazonSearchService::class);
$container->singleton(\App\Messaging\RmqAmazonSearchesConsumer::class);


Route::get('/', "HomeController@index")->name('home');
Route::get('/searches/{id}', "SearchController@showSearch")->name('search');
Route::get('/searches', "SearchController@index")->name('searches');
Route::get('/searches/{id}/products', "SearchController@showProducts")->name('searchproducts');

Route::get('upload', "UploadController@index")->name('upload');
Route::post('upload', "UploadController@uploadFileToDisk")->name('uploadscanfile');
Route::post('search', "UploadController@uploadFileToDb")->name('search');

Route::post('download', "DownloadController@download")->name('download');

