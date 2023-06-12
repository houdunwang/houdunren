<?php

use App\Http\Controllers\SoftController;
use App\Http\Controllers\SoftSecretController;
use App\Http\Controllers\SoftTokenController;

Route::apiResource('soft', SoftController::class);

//刷新软件密钥
Route::post('softSecret/refresh', [SoftSecretController::class, 'refresh']);

//软件密钥验证
Route::post('softToken/check/{softName}', [SoftTokenController::class, 'check']);
Route::post('softToken/{softName}', [SoftTokenController::class, 'getSoftToken']);
// Route::post('secret/get', [SecretController::class, 'get']);
