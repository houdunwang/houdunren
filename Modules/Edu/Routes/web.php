<?php

Route::group(['prefix' => 'Edu', 'middleware' => ['admin'], 'namespace' => 'Admin', 'as' => 'Edu.admin.'], function () {
    Route::get('admin', 'HomeController@index')->name('index');
    Route::get("tag/edit", 'TagController@edit')->name('tag.edit');
    Route::put("tag/update", 'TagController@update')->name('tag.update');

    Route::post("lesson/upload", 'LessonController@upload')->name('lesson.upload');
    Route::resource("lesson", 'LessonController');
});
