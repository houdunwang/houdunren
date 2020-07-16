<?php

Route::group(['prefix' => 'Edu/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'Edu.admin.'], function () {
  Route::get('/', 'HomeController@index')->name('index');
  Route::get('tag/edit', 'TagController@edit')->name('tag.edit');
  Route::put('tag/update', 'TagController@update')->name('tag.update');

  Route::post('lesson/upload', 'LessonController@upload')->name('lesson.upload');
  Route::post('search/lesson', 'LessonController@search')->name('lesson.search');
  Route::resource('lesson', 'LessonController');
  Route::resource('system', 'SystemController');

  Route::resource('subscribe', 'SubscribeController');
});

Route::group(['prefix' => 'Edu', 'middleware' => ['front'], 'namespace' => 'Front', 'as' => 'Edu.front.'], function () {
  Route::resource('topic', 'TopicController');
  Route::get('recommend/{topic}', 'TopicController@recommend')->name('topic.recommend');

  Route::resource('lesson', 'LessonController');
  Route::resource('video', 'VideoController');
  Route::resource('system', 'SystemController');
  Route::resource('sign', 'SignController');
  Route::resource('subscribe', 'SubscribeController');
});

Route::group(['prefix' => 'edu/pay', 'middleware' => ['auth', 'front'], 'namespace' => 'Pay', 'as' => 'Edu.pay.'], function () {
  Route::get('subscribe/alipay/return', 'SubscribeController@alipayReturn')->name('subscribe.alipay.return');
  Route::post('subscribe/alipay/notify', 'SubscribeController@alipayNotify')->name('subscribe.alipay.notify');
  Route::get('subscribe/alipay/{subscribe}', 'SubscribeController@alipay')->name('subscribe.alipay');
});

Route::group(['prefix' => 'edu/member', 'middleware' => ['auth', 'front'], 'namespace' => 'Member', 'as' => 'Edu.member.'], function () {
  Route::get('duration', 'DurationController@index')->name('duration');
  Route::get('order', 'OrderController@index')->name('order');
  Route::get('topic', 'TopicController@index')->name('topic');
});

Route::group(['prefix' => 'edu/space/{user}', 'middleware' => ['front'], 'namespace' => 'Space', 'as' => 'Edu.space.'], function () {
  Route::get('topic', 'TopicController@index')->name('topic');
  Route::get('follower', 'FollowerController@index')->name('follower');
  Route::get('fans', 'FansController@index')->name('fans');
});
