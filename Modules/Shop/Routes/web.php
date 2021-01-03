<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Shop/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'Shop.admin.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
});

Route::group(['prefix' => 'Shop', 'middleware' => ['front'], 'namespace' => 'Front', 'as' => 'Shop.front.'], function () {
    Route::get('/', 'HomeController@index');
});
