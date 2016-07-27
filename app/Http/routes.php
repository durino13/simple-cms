<?php

// Site reoutes

Route::get('/', 'Site\HomeController@index');

// Admin routes

Route::group(['prefix' => 'administrator'], function () {
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('category', 'Admin\CategoryController');
    Route::get('/media', 'Admin\MediaController@index');
    Route::get('/media/embedded', 'Admin\MediaController@embedded');
//    Route::get('/', [
//        'middleware' => 'auth',
//        'uses' => 'Admin\HomeController@index'
//    ]);
    Route::auth();
    Route::get('/home', 'Admin\HomeController@index');
});
