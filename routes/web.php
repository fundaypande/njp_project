<?php

Route::get('/', 'IndexController@front')-> name('index');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
  //show laporan transfer - tarik - user
  Route::get('home/transfer', 'LaporanController@transfer');
  Route::get('home/tarik', 'LaporanController@tarik');
  Route::get('home/rank', 'LaporanController@rank');


  Route::get('/transfer', 'TransferController@show');
  Route::post('transfer/store', 'TransferController@store');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/data', 'HomeController@pieData');

  //profile users
  Route::get('profile/pass', 'UserController@showPass');
  Route::get('profile/{id?}', 'UserController@profile');
  Route::put('profile/{id?}', 'UserController@update');
  Route::put('profile/pass/reset', 'UserController@updatePass');
  Route::put('profile/pic/{id}', 'UserController@updatePic');


  Route::group(['middleware' => ['auth', 'role']], function(){
    Route::get('/super', function(){
      return view('super_admin.admin');
    });

    //kelola transfer
    Route::put('kelola/transfer/{id}/{stat}', 'TransferController@updateStatus');
    Route::get('kelola/transfer', 'TransferController@showTable');
    Route::put('kelola/transfer/{id}', 'TransferController@update');
    Route::delete('kelola/transfer/{id}', 'TransferController@destroy');

    //kelola Tarik
    Route::post('tarik/store', 'TarikController@store');
    Route::get('tarik', 'TarikController@showCreate');
    Route::get('kelola/tarik', 'TarikController@show');
    Route::put('kelola/tarik/{id}', 'TarikController@update');
    Route::delete('kelola/tarik/{id}', 'TarikController@destroy');

    //kelola User
    Route::get('kelola/user', 'UserController@show');
    Route::delete('kelola/user/{id}', 'UserController@destroy');
  });






  //tambahan untuk POST ajax jQuery
  //Route::get('post/{sub?}', 'PostController@search');
  Route::post('posts/s', 'PostController@search');
  Route::get('post/{sub?}', 'PostController@myPosts');
  Route::resource('posts','PostController');
});
