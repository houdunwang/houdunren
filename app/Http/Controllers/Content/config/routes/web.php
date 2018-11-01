<?php
Route::group(['namespace' => 'Content', 'prefix' => 'content', 'as' => 'content.'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::resource('model', 'ModelController');
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');
    Route::get('select_category', 'ArticleController@selectCategory')->name('select_category');
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/update', 'ConfigController@update')->name('config.update');
    Route::resource('template', 'TemplateController');
    Route::get('template/{template}', 'TemplateController@update')->name('template.update');
    Route::resource('slide', 'SlideController');
    //前台展示
    Route::get('c{category}.html', 'HomeController@lists')->name('list');
    Route::get('{article}.html', 'HomeController@article')->name('article');
});