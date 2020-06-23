<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'home';
});

Route::group(['namespace' => 'Common', 'prefix' => "common"], function () {
    Route::get('captcha', 'CaptchaController@make');
});

Route::group(['namespace' => 'Account'], function () {
    Route::resource('login', 'LoginController');
});
