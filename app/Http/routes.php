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


    // TODO Ujednotit, ako idem trashovat clanky ..


    // Archive articles
    Route::delete('archive/{article}', 'Admin\ArticleController@archive')->name('administrator.archive.archive');
    Route::post('archive/{article}', 'Admin\ArticleController@restore')->name('administrator.archive.restore');
    Route::get('archive', 'Admin\ArticleController@listarchive')->name('administrator.archive.index');

    // Trash articles
    Route::get('trash', 'Admin\TrashController@index')->name('administrator.trash.index');
    Route::post('trash/{article}/restore', 'Admin\TrashController@restore')->name('administrator.trash.restore');
    Route::post('trash/{article}/destroy', 'Admin\TrashController@destroy')->name('administrator.trash.destroy');

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