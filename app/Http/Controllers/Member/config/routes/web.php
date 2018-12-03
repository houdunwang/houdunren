<?php
//会员中心
Route::group(['namespace' => 'Member', 'prefix' => 'member', 'as' => 'member.'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::resource('user', 'UserController');
    Route::get('fans/{user}', 'UserController@fans')->name('fans');
    Route::get('follow/{user}', 'UserController@follow')->name('follow');
    Route::get('follower/{user}', 'UserController@follower')->name('follower');
    //会员角色设置
    Route::resource('role', 'RoleController');
    //消息中心
    Route::resource('notification', 'NotificationController');
    //个人空间
    Route::get('space/fans/{user}', 'SpaceController@fans')->name('space.fans');
    Route::get('space/follower/{user}', 'SpaceController@follower')->name('space.follower');
});