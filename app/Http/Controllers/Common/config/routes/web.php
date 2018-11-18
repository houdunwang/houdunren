<?php
//公共控制器
Route::group(['namespace' => 'Common', 'prefix' => 'common', 'as' => 'common.'], function () {
    //点赞
    Route::get('zan/make', 'ZanController@make')->name('zan.make');
    //收藏
    Route::get('favorite', 'FavoriteController@make')->name('favorite.make');
    Route::get('favorite/index', 'FavoriteController@index')->name('favorite.index');
    Route::resource('comment', 'CommentController');
    //上传处理
    Route::post('upload/upload', 'UploadController@upload')->name('upload.upload');
    Route::post('upload/image', 'UploadController@image')->name('upload.image');

    Route::any('upload/lists', 'UploadController@lists')->name('upload.lists');
    //发送验证码
    Route::any('code/send', 'CodeController@send')->name('code.send');
    //支付宝定单处理
    Route::any('alipay/sync', 'PayNotifyController@sync')->name('pay.sync');
    Route::any('alipay/async', 'PayNotifyController@async')->name('pay.async');
});