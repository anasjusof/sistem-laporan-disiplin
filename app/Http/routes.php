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
    //return view('welcome');
    if(Auth::check()){
            if(Auth::user()->roles_id == 1){                // If roles id == 1, redirect to /senaraipensyarah @ admin page
	      return redirect('/pensyarah-senarailaporan');
	    }
	    if(Auth::user()->roles_id == 0){                // If roles id == 0, redirect to /maklumatperibadi @ lecturer page
	      return redirect('/pensyarah-senarailaporan');
	    }
	}
	else{
		return redirect('/login');
	}
});

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>['auth', 'RoleMiddleware:1|0']], function(){
    Route::patch('/changepassword', ['uses'=>'KetuaBatalionController@changePassword'])->name('changePassword');
    Route::get('/pensyarah-senarailaporan', ['uses'=>'PensyarahController@showSenaraiLaporan'])->name('showSenaraiLaporan');
    Route::get('/pensyarah-showlaporan/{laporan_id}', ['uses'=>'PensyarahController@showSpecificLaporan'])->name('showSpecificLaporan');
});

Route::group(['middleware'=>['auth', 'RoleMiddleware:1']], function(){
    Route::post('/ketuaBatalion-createPensyarah', ['uses'=>'KetuaBatalionController@createPensyarah'])->name('createPensyarah');
    Route::delete('/ketuaBatalion-deletePensyarah', ['uses'=>'KetuaBatalionController@deletePensyarah'])->name('deletePensyarah');
    Route::patch('/ketuaBatalion-updatePensyarah', ['uses'=>'KetuaBatalionController@updatePensyarah'])->name('updatePensyarah');
    Route::get('/ketuaBatalion-showPensyarah', ['uses'=>'KetuaBatalionController@showPensyarah'])->name('showPensyarah');
});

Route::group(['middleware'=>['auth', 'RoleMiddleware:0']], function(){
    Route::get('/pensyarah-laporan', ['uses'=>'PensyarahController@showLaporan'])->name('showLaporan');
    Route::post('/pensyarah-createlaporan', ['uses'=>'PensyarahController@createLaporan'])->name('createLaporan');
    Route::delete('/pensyarah-deletelaporan', ['uses'=>'PensyarahController@deleteLaporan'])->name('deleteLaporan');
    Route::patch('/pensyarah-editlaporan', ['uses'=>'PensyarahController@editLaporan'])->name('editLaporan');
    
});



