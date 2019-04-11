<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

//功能开发
Route::group(['middleware' => ['system'], 'prefix' => 'develop', 'as' => 'develop.', 'namespace' => 'Develop'],
    function () {
        //模块模型
        Route::resource('{module}/model', 'ModelController');
        Route::get('{module}/migrate/make', 'MigrateController@make')->name('migrate.make');
        Route::get('{module}/migrate/rollback', 'MigrateController@rollback')->name('migrate.rollback');
        Route::get('{module}/migrate/refresh', 'MigrateController@refresh')->name('migrate.refresh');
    });