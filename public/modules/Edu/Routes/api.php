<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'admin'], 'namespace' => 'Admin', 'prefix' => 'edu/admin'], function () {
    Route::apiResource('lesson', 'LessonController');
    Route::post('lesson/search', 'LessonController@search');
    Route::apiResource('tag', 'TagController');
    Route::apiResource('system', 'SystemController');
    Route::apiResource('subscribe', 'SubscribeController');
});

Route::group(['middleware' => ['front'], 'namespace' => 'Front', 'prefix' => 'edu/front'], function () {
    Route::apiResource('lesson', 'LessonController');
    Route::apiResource('system', 'SystemController');
    Route::apiResource('video', 'VideoController');
    Route::apiResource('tag', 'TagController');
    Route::get('video/favour/{video}', 'VideoController@favour')->middleware('auth:sanctum');
    Route::get('video/favorite/{video}', 'VideoController@favorite')->middleware('auth:sanctum');
    Route::post('video/comment/{video}', 'VideoController@comment')->middleware('auth:sanctum');
    Route::get('video/comment/{video}', 'VideoController@commentList')->middleware('auth:sanctum');
    Route::get('comment/favour/{comment}', 'CommentController@favour')->middleware('auth:sanctum');
    Route::apiResource('topic', 'TopicController')->middleware("auth:sanctum");
    Route::any('topic/search', 'TopicController@index');
    Route::resource('sign', 'SignController');
    Route::resource('subscribe', 'SubscribeController');
});

Route::group(['middleware' => ['auth:sanctum', 'front'], 'namespace' => 'Member', 'prefix' => 'edu/member'], function () {
    Route::apiResource('order', 'OrderController');
    Route::get('duration', 'DurationController@get');
});
