<?php

use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => ['front'], 'prefix' => 'edu', 'namespace' => 'Pay'], function () {
//     Route::any('subscribe/alipay/notify', 'SubscribeController@alipayNotify')->name('pay.subscribe.notify');
//     Route::any('subscribe/alipay/return', 'SubscribeController@alipayReturn')->name('pay.subscribe.return');
//     Route::get('subscribe/alipay/{subscribe}', 'SubscribeController@alipay')->middleware('auth');
// });
Route::view('edu/{any}', 'edu::edu')->where('any', '.*');
// Route::get('edu/admin{any}', function () {
//     return view('admin');
// })->where('any', '.*')->middleware(['auth:sanctum', 'admin']);

// Route::get('edu/member{any}', function () {
//     return view('edu::member');
// })->where('any', '.*')->middleware(['auth:sanctum', 'front']);
