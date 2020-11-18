<?php

use Illuminate\Support\Facades\Route;
//模块扩展
Route::group(['prefix' => 'module', 'namespace' => 'Module', 'as' => 'module.', 'middleware' => ['auth', 'admin']], function () {
  Route::get('config', 'ConfigController@edit')->name('config.edit');
  Route::post('config', 'ConfigController@store')->name('config.store');
  Route::get('menu/{path}', 'MenuController@show')->name('menu.show');
});
