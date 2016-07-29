<?php

// Site reoutes

Route::get('/', 'Site\HomeController@index');

// Admin routes

Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {
    Route::get('/','Admin\ArticleController@index');
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('category', 'Admin\CategoryController');
    Route::get('/media', 'Admin\MediaController@index')->name('administrator.media.index');
    Route::delete('/media', 'Admin\MediaController@destroy')->name('administrator.media.destroy');
    Route::get('/media/embedded', 'Admin\MediaController@embedded');
    Route::auth();
    Route::get('/home', 'Admin\HomeController@index');
});
