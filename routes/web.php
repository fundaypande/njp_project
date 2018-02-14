<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role']], function(){
  Route::get('/transfer', 'TransferController@show');
  Route::get('/super', function(){
    return view('super_admin.admin');
  });

  //kelola transfer
  Route::get('kelola/transfer', 'TransferController@showTable');
  Route::put('kelola/transfer/{id}/{stat}', 'TransferController@updateStatus');
  Route::post('transfer/store', 'TransferController@store');
  Route::put('kelola/transfer/{id}', 'TransferController@update');
  Route::delete('kelola/transfer/{id}', 'TransferController@destroy');

  //kelola Tarik
  Route::post('tarik/store', 'TarikController@store');
  Route::get('tarik', 'TarikController@showCreate');
  Route::get('kelola/tarik', 'TarikController@show');
  Route::put('kelola/tarik/{id}', 'TarikController@update');
  Route::delete('kelola/tarik/{id}', 'TarikController@destroy');





  Route::get('post', 'PostController@myPosts');

  Route::resource('posts','PostController');
});
