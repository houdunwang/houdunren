<?php

use Modules\Edu\Http\Controllers\OrderController;
use Modules\Edu\Http\Controllers\HomeController;

//套餐定单支付
Route::get('Edu/Order/subscribe/{subscribe}', [OrderController::class, 'subscribe'])->middleware(['auth:sanctum', 'module']);

Route::any('Edu/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware(['module']);

Route::get('Edu/aa', [HomeController::class, 'home'])->middleware(['module']);
