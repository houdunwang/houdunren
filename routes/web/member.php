<?php

use Illuminate\Support\Facades\Route;
//会员中心
Route::group(['prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.', 'middleware' => ['auth', 'front']], function () {
  Route::resource('base', 'BaseController')->only(['index', 'store']);
  Route::resource('password', 'PasswordController')->only(['index', 'store']);
  Route::resource('avatar', 'AvatarController')->only(['index', 'store']);
  Route::post('avatar/upload', 'AvatarController@upload')->name('avatar.upload');
  Route::resource('email', 'EmailController')->only(['index', 'store']);
  Route::post('email/code', 'EmailController@code')->middleware(['throttle:1:1'])->name('email.code');
  Route::resource('mobile', 'MobileController')->only(['index', 'store']);
  Route::post('mobile/code', 'MobileController@code')->middleware(['throttle:1:1'])->name('mobile.code');
});
