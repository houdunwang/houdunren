<?php

use Illuminate\Support\Facades\Route;

//线上支付
Route::group(['prefix' => 'pay', 'namespace' => 'Pay', 'as' => 'pay.'], function () {
  // Route::get('sync/{module}', 'PayController@sync')->name('pay.sync');
  // Route::any('async/{module}', 'PayController@async')->name('pay.async');
  // Route::any('wepay/{module}', 'PayController@wepayAsync')->name('pay.wepay');
});
