<?php

Route::post('register', 'User\PassportController@register');
Route::post('login', 'User\PassportController@login');

Route::group(['middleware'=>'auth:api','namespace' => 'Site'], function () {
    Route::resource('site', 'SiteController')->except(['edit','create']);
});

Route::group(['middleware'=>'auth:api','namespace'=>'System','prefix'=>'system'],function(){
    Route::resource('package','PackageController')->except(['edit','create']);
});

Route::group(['middleware'=>'auth:api','namespace'=>'System','prefix'=>'system'],function(){
    Route::resource('group','GroupController')->except(['edit','create']);
});
