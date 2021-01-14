<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\CodeController;

Route::group(['as' => 'api.common.', 'prefix' => 'common'], function () {
    //发送验证码
    // Route::post('code/send', [CodeController::class, 'send'])->name('code.send');
});

Route::group(['as' => 'auth.', 'prefix' => 'auth', 'middleware' => ['front']], function () {
    // Route::post('login', [LoginController::class, 'login'])->name('login.store');
    // Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // Route::post('register', [RegisterController::class, 'register'])->name('register');
});
