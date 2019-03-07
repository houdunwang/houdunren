<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//模块管理
Route::group(['middleware' => ['module'], 'as' => 'module.', 'prefix' => 'module', 'namespace' => 'Module'],
    function () {
        Route::resource('module', 'ModuleController');
        //模块域名
        Route::resource('domain', 'DomainController');
        //模块配置
        Route::resource('config', 'ConfigController');
        //模块菜单
        Route::resource('{type}/menu', 'MenuController');
        //微信文本
        Route::resource('text', 'TextController');
        //图文消息
        Route::resource('cover', 'CoverController');
    });