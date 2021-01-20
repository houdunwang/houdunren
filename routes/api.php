<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\Auth\LoginController;
use App\Api\Auth\UserController;

Route::post('login', [LoginController::class, 'store']);

//用户处理
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user'], function () {
    Route::get('info', [UserController::class, 'info']);
    Route::put('base', [UserController::class, 'base']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
