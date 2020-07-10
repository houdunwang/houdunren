<?php

Route::group(['prefix' => 'Edu/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'Edu.admin.'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get("tag/edit", 'TagController@edit')->name('tag.edit');
    Route::put("tag/update", 'TagController@update')->name('tag.update');

    Route::post("lesson/upload", 'LessonController@upload')->name('lesson.upload');
    Route::post('search/lesson', 'LessonController@search')->name('lesson.search');
    Route::resource("lesson", 'LessonController');
    Route::resource("system", 'SystemController');
});
