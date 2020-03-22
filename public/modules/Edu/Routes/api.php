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
  Route::resource('system', 'SystemController')->only(['index', 'show']);
  Route::resource('video', 'VideoController')->only(['index', 'show'])->middleware('auth:api');
  Route::get('video/favour/{video}', 'VideoController@favour')->middleware('auth:api');
  Route::get('video/favorite/{video}', 'VideoController@favorite')->middleware('auth:api');
  Route::post('video/comment/{video}', 'VideoController@comment')->middleware('auth:api');
  Route::get('video/comment/{video}', 'VideoController@commentList')->middleware('auth:api');
  Route::get('comment/favour/{comment}', 'CommentController@favour')->middleware('auth:api');
  Route::resource('topic', 'TopicController')->middleware("auth:api");
  Route::any('topic/search', 'TopicController@index');
  Route::resource('sign', 'SignController')->middleware('auth:api');
});
