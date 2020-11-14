<?php

Route::group(['prefix' => 'Article/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'article.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
  Route::resource('model', 'ModelController')->except('show');
  Route::resource('category', 'CategoryController')->shallow();
  Route::get('content/select/category', 'ContentController@category')->name('content.category');
  Route::get('content/create/{category}', 'ContentController@create')->name('content.create');
  Route::resource('content', 'ContentController')->except(['show', 'create'])->shallow();
  Route::resource('model.field', 'FieldController')->shallow();
  Route::get('{model}/system/field', 'SystemFieldController@index')->name('system.field.index');
  Route::get('{model}/system/field/edit/{name}', 'SystemFieldController@edit')->name('system.field.edit');
  Route::put('{model}/system/field/update/{name}', 'SystemFieldController@update')->name('system.field.update');
  Route::resource('template', 'TemplateController')->only('index');
  Route::get('template/set/{template}', 'TemplateController@set')->name('template.set');
});

Route::group(['prefix' => 'Article', 'middleware' => ['front'], 'namespace' => 'Front', 'as' => 'Article.front.'], function () {
  Route::get('/', 'HomeController@index');
});
