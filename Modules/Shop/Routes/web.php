<?php
/*
|--------------------------------------------------------------------------
| 后台管理: 后台管理员操作的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'shop/admin',
    'as' => 'shop.admin.',
    'namespace' => 'Admin',
    'middleware' => ['admin'],
], function () {
    Route::resource('cms', 'CmsController');
});
/*
|--------------------------------------------------------------------------
| 会员中心: 会员中心使用的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'shop/member',
    'as' => 'shop.member.',
    'namespace' => 'Member',
    'middleware' => ['auth', 'site'],
], function () {
    Route::resource('module', 'ModuleController');
    Route::resource('package', 'PackageController');
});
/*
|--------------------------------------------------------------------------
| 前台路由: 前台会员浏览使用，如果需要用户登录检测请添加auth中间件
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'shop/front',
    'as' => 'shop.front.',
    'namespace' => 'Front',
    'middleware' => ['site'],
], function () {
    Route::resource('module', 'Front\ModuleController');

});



















