<?php

Route::group(['prefix' => '{MODULE_NAME}/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => '{MODULE_NAME}.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
});

Route::group(['prefix' => '{MODULE_NAME}', 'middleware' => ['front'], 'namespace' => 'Front', 'as' => '{MODULE_NAME}.front.'], function () {
  Route::get('/', 'HomeController@index');
});
