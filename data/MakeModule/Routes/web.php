<?php

Route::group(['prefix' => '{MODULE_NAME}/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => '{MODULE_NAME}.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
});
