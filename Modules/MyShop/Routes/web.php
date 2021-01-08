<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'MyShop/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'MyShop.admin.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'MyShop', 'middleware' => ['front'], 'namespace' => 'Front', 'as' => 'MyShop.front.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});
