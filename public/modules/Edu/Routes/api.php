<?php
Route::group(['middleware' => ['auth:api', 'module'], 'namespace' => 'Admin', 'prefix' => 'edu/admin'], function () {
  Route::resource('lesson', 'LessonController')->except(['create', 'show']);
  Route::post('lesson/search', 'LessonController@search');
  Route::resource('tag', 'TagController')->only(['index', 'store', 'update', 'destroy']);
  Route::resource('system', 'SystemController')->except(['show', 'create']);
  Route::resource('subscribe', 'SubscribeController')->except(['show', 'create']);
});
