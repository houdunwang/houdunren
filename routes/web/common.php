<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

Route::group(['as' => 'common.', 'prefix' => 'common', 'namespace' => 'Common'],
    function () {
        //支付通知
        Route::any('alipay/async/{site}', 'AliPayController@async')->name('alipay.async');
        Route::get('alipay/sync/{site}', 'AliPayController@sync')->name('alipay.sync');
    });