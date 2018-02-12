<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
  Route::get('/transfer', 'TransferController@show');

  Route::get('/tarik', function(){
    return view('sidebar.tarik_uang');
  });

  Route::post('transfer/store', 'TransferController@store');
});
