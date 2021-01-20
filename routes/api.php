<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\LoginController;
use App\Http\Controllers\Api\User\UserController;

//登录并返回token
Route::post('login', [LoginController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum', 'front'], 'prefix' => 'user'], function () {
    //获取当前登录用户资料
    Route::get('info', [UserController::class, 'info']);
});
