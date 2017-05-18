<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/pensyarah-senarailaporan', ['uses'=>'PensyarahController@showSenaraiLaporan'])->name('showSenaraiLaporan');
Route::get('/pensyarah-laporan', ['uses'=>'PensyarahController@showLaporan'])->name('showLaporan');
Route::post('/pensyarah-createlaporan', ['uses'=>'PensyarahController@createLaporan'])->name('createLaporan');
Route::post('/pensyarah-deletelaporan', ['uses'=>'PensyarahController@deleteLaporan'])->name('deleteLaporan');
