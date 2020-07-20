<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@show')->name('login');
    Route::post('login', 'LoginController@login')->name('login.store');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@show')->name('register.store');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('register/code', 'RegisterController@code')->middleware(['throttle:1:1', 'front'])->name('register.code');
    Route::get('forget', 'ForgetController@show')->name('forget.show');
    Route::post('forget', 'ForgetController@store')->name('forget.store');
    Route::post('forget/code', 'ForgetController@code')->middleware(['throttle:1111:1', 'front'])->name('forget.code');
});

Route::get('admin', 'Site\SiteController@index')->name('admin')->middleware('auth');

Route::group(['prefix' => 'common', 'middleware' => ['auth'], 'namespace' => 'Common', 'as' => 'common.'], function () {
    Route::post('upload', 'UploadController@upload')->name('upload');
    Route::get('favorite/{model}/{id}/{module?}', 'FavoriteController@make')->name('favorite')->middleware('auth');
    Route::get('favour/{model}/{id}/{module?}', 'FavourController@make')->name('favour')->middleware('auth');
    Route::get('follower/{user}', 'FollowerController@make')->name('follower')->middleware('auth');
    Route::post('code/email', 'CodeController@email')->name('code.email')->middleware('auth');
    Route::post('code/mobile', 'CodeController@mobile')->name('code.mobile')->middleware('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'system'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('system', 'HomeController@setting')->name('setting');

    Route::get('module', 'ModuleController@index')->name('module.index');
    Route::get('module/install/{name}', 'ModuleController@install')->name('module.install');
    Route::delete('module/uninstall/{module:name}', 'ModuleController@uninstall')->name('module.uninstall');

    Route::resource('package', 'PackageController')->except(['show']);
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/edit', 'ConfigController@update')->name('config.update');
    Route::any('config/upload', 'ConfigController@upload')->name('config.upload');

    Route::resource('group', 'GroupController');

    Route::get('my/edit', 'MyController@edit')->name('my.edit');
    Route::put('my/update', 'MyController@update')->name('my.update');
});

Route::group(['prefix' => 'site', 'namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth']], function () {
    Route::resource('site', 'SiteController');
    Route::get('{site}/config', 'ConfigController@edit')->name('config.edit');
    Route::put('{site}/config', 'ConfigController@update')->name('config.update');
    Route::resource('{site}/role', 'RoleController');
    Route::get('{site}/permission/{role}', 'PermissionController@edit')->name('permission.edit');
    Route::put('{site}/permission/{role}', 'PermissionController@update')->name('permission.update');

    Route::resource('{site}/admin', 'AdminController')->only(['index', 'destroy']);
    Route::get('{site}/admin/store/{admin}', 'AdminController@store')->name('admin.store');
    Route::post('{site}/admin/search', 'AdminController@search')->name('admin.search');
    Route::get('{site}/admin/role/{user}', 'AdminController@role')->name('admin.role');
    Route::put('{site}/admin/role/{user}', 'AdminController@updateRole')->name('admin.role.update');

    Route::get('{site}/module', 'ModuleController@index')->name('module.index');
    Route::get('{site}/module/{module}', 'ModuleController@show')->name('module.show');

    Route::get('{site}/menu/{menu}', 'MenuController@show')->name('menu.show');
});

Route::group(['prefix' => 'member', 'namespace' => 'Member', 'as' => 'member.', 'middleware' => ['auth', 'front']], function () {
    Route::resource('base', 'BaseController')->only(['index', 'store']);
    Route::resource('password', 'PasswordController')->only(['index', 'store']);
    Route::resource('avatar', 'AvatarController')->only(['index', 'store']);
    Route::post('avatar/upload', 'AvatarController@upload')->name('avatar.upload');
    Route::resource('email', 'EmailController')->only(['index', 'store']);
    Route::post('email/code', 'EmailController@code')->middleware(['throttle:1:1'])->name('email.code');
    Route::resource('mobile', 'MobileController')->only(['index', 'store']);
    Route::post('mobile/code', 'MobileController@code')->middleware(['throttle:1:1'])->name('mobile.code');
});
