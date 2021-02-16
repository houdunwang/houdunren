<?php

use Modules\Edu\Http\Controllers\PayController;

Route::group(['prefix' => 'Edu'], function () {
    Route::get('pay/return/{site}', [PayController::class, 'return'])->name('pay.return')->middleware(['front']);

    Route::get('pay/notify/{site}', [PayController::class, 'notify'])->name('pay.notify')->middleware(['front']);

    Route::get('pay/subscribe/{subscribe}', [PayController::class, 'subscribe'])->middleware(['front']);
});
