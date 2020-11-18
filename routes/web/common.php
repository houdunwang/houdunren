<?php

use Illuminate\Support\Facades\Route;
//公共业务
Route::group(['prefix' => 'common', 'namespace' => 'Common', 'as' => 'common.'], function () {
  Route::post('upload/make', 'UploadController@make')->name('upload.make');
  Route::post('upload/wangEditor', 'UploadController@wangEditor')->name('upload.wangEditor');
  Route::post('upload/wangEditorMaterialNewsUpload/{wechat}', 'UploadController@wangEditorMaterialNewsUpload')->name('upload.wangEditorMaterialNewsUpload');
  Route::get('favorite/{model}/{id}/{module?}', 'FavoriteController@make')->name('favorite')->middleware('auth');
  Route::get('favour/{model}/{id}/{module?}', 'FavourController@make')->name('favour')->middleware('auth');
  Route::get('follower/{user}', 'FollowerController@make')->name('follower')->middleware('auth');
  Route::post('code/email', 'CodeController@email')->name('code.email')->middleware('auth');
  Route::post('code/mobile', 'CodeController@mobile')->name('code.mobile')->middleware('auth');
});
