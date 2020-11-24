<?php

use Illuminate\Support\Facades\Route;

//站点管理
Route::group(['prefix' => 'site', 'namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth', 'site']], function () {
  Route::resource('site', 'SiteController')->middleware(['auth', 'site']);
});

//其他站点相关业务
Route::group(['prefix' => 'site/{site}', 'namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth', 'site']], function () {
  Route::get('config', 'ConfigController@edit')->name('config.edit');
  Route::put('config', 'ConfigController@update')->name('config.update');
  Route::resource('role', 'RoleController');
  Route::get('permission/{role}', 'PermissionController@edit')->name('permission.edit');
  Route::put('permission/{role}', 'PermissionController@update')->name('permission.update');
  Route::resource('admin', 'AdminController')->only(['index', 'destroy']);
  Route::get('admin/store/{admin}', 'AdminController@store')->name('admin.store');
  Route::post('search/admin', 'SearchController@admin')->name('search.admin');
  Route::get('admin/role/{user}', 'AdminController@role')->name('admin.role');
  Route::put('admin/role/{user}', 'AdminController@updateRole')->name('admin.role.update');
  //站点模块列表
  Route::get('module', 'ModuleController@index')->name('module.index');
  Route::get('module/admin/{module}', 'ModuleController@admin')->name('module.admin');
  //站点通用菜单供前台模块使用
  Route::get('menu', 'MenuController@index')->name('menu.index');
  Route::get('menu/get', 'MenuController@get')->name('menu.get');
  Route::post('menu', 'MenuController@store')->name('menu.store');
});
