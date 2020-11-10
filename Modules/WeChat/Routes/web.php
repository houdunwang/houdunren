<?php

Route::group(['prefix' => 'WeChat/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'WeChat.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
  Route::get('user/{wechat?}', 'UserController@index')->name('user.index');
  Route::resource('text', 'TextController');
  Route::resource('news', 'NewsController');
  Route::get('material/preview/{openid}/{material}', 'MaterialController@preview')->name('material.preview');
  Route::resource('material', 'MaterialController');
});
