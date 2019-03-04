<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/app', function (Request $request) {
    return $request->user();
});
//系统管理
Route::group(['prefix' => 'shop/cms','namespace'=>'Api'], function () {
    //系统更新列表
    Route::get('{build}', 'CmsController@index');
    //下载系统更新文件
    Route::post('file', 'CmsController@file');
});
//模块管理
Route::group(['prefix' => 'shop/module', 'middleware' => ['auth:api'],'namespace'=>'Api'], function () {
    Route::get('/', 'ModuleController@index');
    Route::get('/{name}', 'ModuleController@module');
    Route::get('/{name}/download', 'ModuleController@download');
});
