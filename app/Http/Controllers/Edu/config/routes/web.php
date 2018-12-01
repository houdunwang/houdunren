<?php
//在线教育
Route::group(['namespace' => 'Edu', 'prefix' => 'edu', 'as' => 'edu.'], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('lesson/lists', 'LessonController@lists')->name('lesson.lists');
    Route::get('lesson/{tag}/tag', 'LessonController@tag')->name('lesson.tag');
    //系统课程
    Route::resource('lesson/system', 'SystemLessonController');
    //课程管理
    Route::resource('lesson', 'LessonController');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    //贴子
    Route::resource('topic', 'TopicController');
    Route::get('topics_{category}.html', 'TopicController@lists')->name('topic_list');
    //会员中心贴子管理
    Route::get('topic_manage', 'TopicController@manage')->name('topic.manage');
    //视频
    Route::resource('video', 'VideoController');
    Route::get('search', 'SearchController@lists')->name('search');
    //动态管理
    Route::resource('dynamic', 'DynamicController');
    //模块配置
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/update', 'ConfigController@update')->name('config.update');
    //会员中心
    Route::get('topic/{user}', 'UserController@topic')->name('user.topic');
    //文档管理
    Route::resource('document', 'DocumentController');
    Route::resource('chapter', 'ChapterController');
    Route::resource('section', 'EduSectionController');
    Route::get('document_manage', 'DocumentController@manage')->name('document.manage');
    //会员评阅
    Route::get('shop', 'ShopController@index')->name('shop.index');
    Route::get('shop/{shop}/pay', 'ShopController@pay')->name('shop.pay');
    //文档管理
    Route::resource('document', 'DocumentController');
    Route::get('document/flag/{document}', 'DocumentController@flag')->name('document.flag');
    Route::resource('chapter', 'ChapterController');
    Route::resource('section', 'EduSectionController');
    Route::get('document_manage', 'DocumentController@manage')->name('document.manage');
    //定单管理
    Route::resource('order', 'OrderController');
    Route::get('subscribe', 'SubscribeController@show')->name('subscribe.show');
    //直播
    Route::get('live', 'LiveController@make')->name('live');
});