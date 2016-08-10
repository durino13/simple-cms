<?php

// Site reoutes

Route::get('/', 'Site\HomeController@index');

// Auth routes
Route::group(['prefix' => 'administrator'
], function () {
    Route::auth();
});

// Admin routes
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {

    // Home route
    Route::get('/','Admin\ArticleController@index');

    // Article routes
    Route::resource('article', 'Admin\ArticleController');

    // Archive articles
    Route::delete('archive/{article}', 'Admin\ArticleController@archive')->name('administrator.archive.archive');
    Route::post('archive/{article}', 'Admin\ArticleController@restore')->name('administrator.archive.restore');
    Route::get('archive', 'Admin\ArticleController@listarchive')->name('administrator.archive.index');

    // Trash articles
    Route::get('trash', 'Admin\ArticleController@listtrash')->name('administrator.trash.index');
    Route::delete('trash/{article}', 'Admin\ArticleController@wipe')->name('administrator.trash.wipe');

    // Category routes
    Route::resource('category', 'Admin\CategoryController');

    // Media routes
    Route::get('/media', 'Admin\MediaController@index')->name('administrator.media.index');
    Route::delete('/media', 'Admin\MediaController@destroy')->name('administrator.media.destroy');
    Route::get('/media/embedded', 'Admin\MediaController@embedded');
    Route::post('/media/upload', 'Admin\MediaController@upload');
    Route::get('/media/download', 'Admin\MediaController@download');

});