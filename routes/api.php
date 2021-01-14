<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\CodeController;

Route::group(['as' => 'api.common.', 'prefix' => 'common'], function () {
    //发送验证码
    Route::post('code/send', [CodeController::class, 'send'])->name('code.send');
});
