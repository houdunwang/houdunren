<?php

use Illuminate\Http\Request;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'User\PassportController@register');
Route::post('login', 'User\PassportController@login');

Route::group(['namespace' => 'Site'], function () {
    Route::resource('site', 'SiteController');
});