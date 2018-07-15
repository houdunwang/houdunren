<?php

Route::group([
    'middleware' => ['web', 'auth:admin'],
    'prefix'     => 'article',
    'namespace'  => 'Modules\Article\Http\Controllers',
], function () {
    Route::get('/','ContentController@index');
    Route::resource('category', 'CategoryController');
});

//content-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'article','namespace'=>"Modules\Article\Http\Controllers"],
function () {
    Route::resource('content', 'ContentController')->middleware("permission:admin,resource");
});
