<?php

use Illuminate\Support\Facades\Route;

//用户帐号相关
Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => ['front']], function () {
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login')->name('login.store');
  Route::get('logout', 'LoginController@logout')->name('logout');
  Route::get('register', 'RegisterController@show')->name('register.store');
  Route::post('register', 'RegisterController@register')->name('register');
  Route::post('register/code', 'RegisterController@code')->middleware(['throttle:60,1', 'front'])->name('register.code');
  Route::get('forget', 'ForgetController@show')->name('forget.show');
  Route::post('forget', 'ForgetController@store')->name('forget.store');
  Route::post('forget/code', 'ForgetController@code')->middleware(['throttle:60,1', 'front'])->name('forget.code');
});
