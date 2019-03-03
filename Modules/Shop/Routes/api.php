<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/app', function (Request $request) {
    return $request->user();
});
//系统管理
Route::group(['prefix' => 'shop/cms'], function () {
    //系统更新列表
    Route::get('{build}', 'Api\CmsController@index');
    //下载系统更新文件
    Route::post('file', 'Api\CmsController@file');
});
//模块管理
Route::group(['prefix' => 'shop/module', 'middleware' => ['auth:api']], function () {
    Route::get('/', function () {
        return 33;
    });
});
