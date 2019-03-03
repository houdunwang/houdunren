<?php
/*
|--------------------------------------------------------------------------
| 网站路由设置
|--------------------------------------------------------------------------
|
| 路由必须按下面方式定义在路由组中
| 路由组必须存在 prefix 与 as 并且必须为 模块小写标识
*/
Route::group(['prefix' => 'shop', 'as' => 'shop.', 'middleware' => ['site']], function () {
//    Route::resource('test', 'AppController');
});

Route::group([
    'prefix' => 'shop/admin',
    'as' => 'shop.admin.',
    'namespace' => 'Admin',
    'middleware' => ['admin'],
],
    function () {
        Route::resource('cms', 'CmsController');
    });

Route::group([
    'prefix' => 'shop/member',
    'as' => 'shop.member.',
    'namespace' => 'Member',
    'middleware' => ['auth', 'site'],
], function () {
    Route::resource('module', 'ModuleController');
    Route::resource('package', 'PackageController');
});



