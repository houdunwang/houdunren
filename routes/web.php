<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//后台管理
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin', 'AdminController');
    Route::resource('site', 'SiteController');
});
//登录退出
Route::resource('login', 'LoginController');
Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');
//公共
Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::any('upload', 'Common\UploadController@upload')->name('upload.make');
    Route::any('upload-lists', 'Common\UploadController@lists')->name('upload.lists');
});
//用户管理
Route::group(['middleware' => ['auth']], function () {
    //个人中心
    Route::resource('user', 'UserController');
    //后台用户管理
    Route::resource('user', 'UserController');
    //站点管理
    Route::resource('site', 'SiteController');
});
