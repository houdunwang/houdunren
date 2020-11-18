<?php

use Illuminate\Support\Facades\Route;

//微信服务器通信接口
Route::any('wechat/api/{model}', 'Api\WeChat\ProcessorController@handle')->name('wechat.api')->middleware('front');

//站点微信公众号配置
Route::group(['prefix' => 'wechat/{site}', 'namespace' => 'WeChat', 'as' => 'wechat.', 'middleware' => ['auth', 'site']], function () {
  Route::resource('wechat', 'WeChatController');
  Route::get('default/{wechat}', 'DefaultController@edit')->name('default.edit');
  Route::put('default/{wechat}', 'DefaultController@update')->name('default.update');
  Route::get('menu/{wechat}', 'MenuController@edit')->name('menu.edit');
  Route::put('menu/{wechat}', 'MenuController@update')->name('menu.update');
  Route::get('menu/push/{wechat}', 'MenuController@push')->name('menu.push');
  Route::get('user/sync/{wechat}/{openid?}', 'UserController@sync')->name('user.sync');

  //微信登录
  Route::get('login/wechat', 'WeChatController@redirectToProvider')->name('login.wechat');
  Route::get('login/wechat/callback', 'WeChatController@handleProviderCallback')->name('login.wechat.callback');
});

//微信模块应用
Route::group(['prefix' => 'wechat/module', 'namespace' => 'WeChat', 'as' => 'wechat.', 'middleware' => ['auth', 'admin']], function () {
  Route::get('rule/wechat', 'RuleController@wechat');
  Route::resource('rule', 'RuleController')->only(['show', 'destroy']);
  Route::post('rule/check-keyword', 'RuleController@checkKeyword')->name('rule.keyword.check');
  Route::post('user/search/{wechat}', 'UserController@search')->name('user.search');
});
