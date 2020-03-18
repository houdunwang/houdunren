<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'module'], 'namespace' => 'Admin', 'prefix' => 'edu/admin'], function () {
  Route::resource('lesson', 'LessonController')->except(['create', 'show']);
  Route::post('lesson/search', 'LessonController@search');
  Route::resource('tag', 'TagController')->only(['index', 'edit', 'store', 'update', 'destroy']);
  Route::resource('system', 'SystemController')->except(['show', 'create']);
  Route::resource('subscribe', 'SubscribeController')->except(['show', 'create']);
});

Route::group(['middleware' => ['front'], 'namespace' => 'Front', 'prefix' => 'edu/front'], function () {
  Route::resource('lesson', 'LessonController')->only(['index', 'show']);
  Route::resource('video', 'VideoController')->only(['index', 'show'])->middleware('auth:api');
  Route::get('video/favour/{video}', 'VideoController@favour')->middleware('auth:api');
});
