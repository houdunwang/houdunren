<?php

Route::group(['prefix' => 'Article/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'Article.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
});
