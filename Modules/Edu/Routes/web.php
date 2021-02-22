<?php

use Modules\Edu\Http\Controllers\PayController;
use Modules\Edu\Http\Controllers\HomeController;
//支付
Route::group(['prefix' => 'Edu'], function () {
    Route::get('/', [HomeController::class, 'index'])->middleware(['front']);
    Route::get('pay/return/{site}', [PayController::class, 'return'])->name('pay.return')->middleware(['front']);
    Route::get('pay/notify/{site}', [PayController::class, 'notify'])->name('pay.notify')->middleware(['front']);
    Route::get('pay/subscribe/{subscribe}', [PayController::class, 'subscribe'])->middleware(['front']);
});

// //后台
// Route::any('Edu/admin/{path?}', function () {
//     return view("edu::app");
// })->where('path', '.*')->middleware(['admin']);

// //前台
// Route::any('Edu/{path?}', function () {
//     return view("edu::app");
// })->where('path', '.*')->middleware(['front']);

Route::any('Edu/{path?}', function () {
    return view('edu::app');
})->where('path', '.*')->middleware(['module']);
