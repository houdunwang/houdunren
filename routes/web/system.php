<?php

use Illuminate\Support\Facades\Route;

//系统核心功能
Route::group(['prefix' => 'system', 'middleware' => ['auth', 'system'], 'namespace' => 'System', 'as' => 'system.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
  Route::get('module', 'ModuleController@index')->name('module.index');
  Route::get('module/install/{name}', 'ModuleController@install')->name('module.install');
  Route::delete('module/uninstall/{module:name}', 'ModuleController@uninstall')->name('module.uninstall');
  Route::get('module/installed', 'ModuleController@installed')->name('module.installed');
  Route::get('template', 'TemplateController@index')->name('template.index');
  Route::get('template/install/{name}', 'TemplateController@install')->name('template.install');
  Route::delete('template/uninstall/{template:name}', 'TemplateController@uninstall')->name('template.uninstall');
  Route::get('template/installed', 'TemplateController@installed')->name('template.installed');
  Route::resource('package', 'PackageController')->except(['show']);
  Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
  Route::put('config/edit', 'ConfigController@update')->name('config.update');
  Route::any('config/upload', 'ConfigController@upload')->name('config.upload');
  Route::resource('group', 'GroupController');
  Route::get('my/edit', 'MyController@edit')->name('my.edit');
  Route::put('my/update', 'MyController@update')->name('my.update');
});
