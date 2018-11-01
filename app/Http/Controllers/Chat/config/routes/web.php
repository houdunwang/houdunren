<?php
//微信模块
Route::group(['namespace' => 'Chat', 'prefix' => 'chat', 'as' => 'chat.'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::any('/', 'HandleController@handle');
    Route::resource('base', 'ChatBaseController');
    Route::resource('news', 'ChatNewsController');
    Route::resource('button', 'ChatButtonController');
    Route::get('button/{button}/push', 'ChatButtonController@push')->name('button.push');
    Route::resource('default', 'ChatDefaultController');
});