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
    Route::get('lesson/favour/{lesson}', 'LessonController@favour');
    Route::get('lesson/favorite/{lesson}', 'LessonController@favorite');
    Route::apiResource('system', 'SystemController');
    Route::apiResource('video', 'VideoController');
    Route::apiResource('tag', 'TagController');
    Route::get('site', 'SiteController@get');
    Route::get('video/favour/{video}', 'VideoController@favour');
    Route::get('video/favorite/{video}', 'VideoController@favorite');
    Route::post('video/comment/{video}', 'VideoController@comment');
    Route::get('video/comment/{video}', 'VideoController@commentList');
    Route::get('comment/favour/{comment}', 'CommentController@favour');
    Route::apiResource('topic', 'TopicController');
    Route::any('topic/search', 'TopicController@index');
    Route::get('topic/favour/{topic}', 'TopicController@favour');
    Route::get('topic/favorite/{topic}', 'TopicController@favorite');
    Route::post('topic/comment/{topic}', 'TopicController@comment');
    Route::get('topic/comment/{video}', 'TopicController@commentList');

    Route::resource('sign', 'SignController');
    Route::apiResource('subscribe', 'SubscribeController');
    Route::apiResource('user', 'UserController');
    Route::get('user/follower/{user}', 'UserController@follower');
    Route::get('user/favour/{user}', 'UserController@favour');
});

Route::group(['middleware' => ['auth:sanctum', 'front'], 'namespace' => 'Member', 'prefix' => 'edu/member'], function () {
    Route::apiResource('order', 'OrderController');
    Route::get('duration', 'DurationController@get');
    Route::get('lesson', 'LessonController@index');
    Route::get('video', 'VideoController@index');
});

Route::group(['middleware' => ['front'], 'namespace' => 'Center', 'prefix' => 'edu/center'], function () {
    Route::get('user/{user}', 'UserController@show');
    Route::get('follower/{user}', 'UserController@follower');
    Route::get('fans/{user}', 'UserController@fans');
    Route::get('{user}/topic', 'TopicController@index');
});
