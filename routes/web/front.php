<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//前台服务
Route::group(['middleware' => ['auth', 'front'], 'as' => 'front.', 'namespace' => 'Front'], function () {
    Route::any('notify/code', 'NotifyController@code')->name('notify.code');
    Route::any('upload', 'UploadController@upload')->name('upload.make');
    //粉丝关注
    Route::get('follow/{user}', 'FollowController@make')->name('follow');
    //点赞
    Route::get('favour/{model}/{id}', 'FavourController@make')->name('favour');
    //收藏
    Route::get('favorite/{model}/{id}', 'FavoriteController@make')->name('favorite');
});