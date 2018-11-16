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

Route::get('/', "HomeController@index")->name('home');
Route::get('upload', "UploadController@index")->name('upload');

Route::post('upload', "UploadController@upload")->name('uploadscanfile');
Route::post('matchupload', "UploadController@matchUpload")->name('matchupload');
Route::post('search', "UploadController@createSearch")->name('search');