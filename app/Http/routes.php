<?php

// Site reoutes

Route::get('/', 'Site\HomeController@index');

// Auth routes
Route::group(['prefix' => 'administrator'], function () {
    Route::auth();
});

// Admin routes
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {

    // Home route
    Route::get('/','Admin\ArticleController@index');

    // Resource routes
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('category', 'Admin\CategoryController');

    // Media routes
    Route::get('/media', 'Admin\MediaController@index')->name('administrator.media.index');
    Route::delete('/media', 'Admin\MediaController@destroy')->name('administrator.media.destroy');
    Route::get('/media/embedded', 'Admin\MediaController@embedded');

});
