<?php

Route::group(['prefix' => 'Chat/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'Chat.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
});
