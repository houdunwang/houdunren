<?php

use App\Http\Controllers\SoftController;
use App\Http\Controllers\SoftSecretController;
use App\Http\Controllers\SoftTokenController;

Route::post('soft/checkUpdate', [SoftController::class, 'checkUpdate']);
Route::apiResource('soft', SoftController::class);

//刷新软件密钥
Route::get('softSecret', [SoftSecretController::class, 'getSoftSecret']);
Route::get('softSecret/refresh', [SoftSecretController::class, 'refresh']);

//软件令牌
Route::post('softToken/checkToken', [SoftTokenController::class, 'checkSoftToken']);
Route::post('softToken/getToken', [SoftTokenController::class, 'getSoftToken']);
