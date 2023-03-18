<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//登录注册
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('find-password', 'findPassword');
});

//发送验证码
Route::controller(CodeController::class)->prefix('code')->group(function () {
    Route::post('exists', 'exists');
    Route::post('no-exists', 'noExists');
});

//用户相关
Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('current', 'current');
    Route::put('update', 'update');
    Route::put('password', 'password');
    Route::put('email', 'email');
    Route::put('mobile', 'mobile');
    Route::delete('delete', 'delete');
    Route::delete('remove_avatar/{user}', 'removeAvatar');
    Route::post('lock_user/{user}', 'lockUser');
    Route::post('removeAllData/{user}', 'removeAllData');
});
Route::apiResource('user', UserController::class);

//上传处理
Route::controller(UploadController::class)->prefix("upload")->group(function () {
    Route::post('image', 'image');
    Route::post('avatar', 'avatar');
});
