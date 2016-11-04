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
    Route::get('article/archive', 'Admin\ArticleController@listarchive')->name('administrator.article.archive.index');
    Route::post('article/{article}/archive/archive', 'Admin\ArticleController@archive')->name('administrator.article.archive.archive');
    Route::post('article/{article}/archive/restore', 'Admin\ArticleController@restore')->name('administrator.article.archive.restore');
    Route::resource('article', 'Admin\ArticleController');

    // Trash routes
    Route::get('trash', 'Admin\TrashController@index')->name('administrator.trash.index');
    Route::post('trash/{item}/restore', 'Admin\TrashController@restore')->name('administrator.trash.restore');
    Route::post('trash/{item}/destroy', 'Admin\TrashController@destroy')->name('administrator.trash.destroy');

    // Category routes
    Route::resource('category', 'Admin\CategoryController');

    // User routes
    Route::resource('user', 'Admin\UserController');

    // Media routes
//    Route::get('/media', 'Admin\MediaController@index')->name('administrator.media.index');
//    Route::delete('/media', 'Admin\MediaController@destroy')->name('administrator.media.destroy');
//    Route::get('/media/embedded', 'Admin\MediaController@embedded');
//    Route::post('/media/upload', 'Admin\MediaController@upload');
//    Route::get('/media/download', 'Admin\MediaController@download');

});

// Catch all route ..
Route::get('{any}', 'Site\HomeController@detail')->where('any', '.*')->name('site.article.any');