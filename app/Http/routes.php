<?php

// Site reoutes

Route::get('/', function() {
    var_dump('Main site ...');
    exit();
});

// Admin routes

Route::group(['prefix' => 'administrator'], function () {
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('category', 'Admin\CategoryController');
    Route::get('/', [
        'middleware' => 'auth',
        'uses' => 'Admin\HomeController@index'
    ]);
    Route::auth();
    Route::get('/home', 'Admin\HomeController@index');
});
