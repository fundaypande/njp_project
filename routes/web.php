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
  Route::get('/kelola/transfer', 'TransferController@showTable');

  Route::get('/tarik', function(){
    return view('sidebar.tarik_uang');
  });

  Route::get('/ulur', function(){
    return view('sidebar.post2');
  });


  Route::post('transfer/store', 'TransferController@store');

  Route::get('post', 'PostController@myPosts');

  Route::resource('posts','PostController');
});
