<?php

use Modules\Edu\Http\Controllers\PayController;
use Modules\Edu\Http\Controllers\HomeController;
//首页
Route::get('/Edu', function () {
    return view('edu::app');
})->middleware(['module']);

//支付
Route::group(['prefix' => 'Edu'], function () {
    Route::get('pay/return/{site}', [PayController::class, 'return'])->middleware(['module']);
    Route::get('pay/notify/{site}', [PayController::class, 'notify'])->middleware(['module']);
    Route::get('pay/subscribe/{subscribe}', [PayController::class, 'subscribe'])->middleware(['auth:sanctum', 'module']);
});

Route::any('Edu/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware(['module']);
