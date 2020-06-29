<?php

use App\Notifications\VerificationCodeNotification;
use App\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['namespace' => 'Account'], function () {
    Route::resource('login', 'LoginController')->only(['index', 'store']);

    Route::resource('register', 'RegisterController')->only(['index', 'store']);
    Route::post('register/code', 'RegisterController@code');
});
