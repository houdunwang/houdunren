<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home')->middleware('front');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => ['front']], function () {
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login')->name('login.store');
  Route::get('logout', 'LoginController@logout')->name('logout');
  Route::get('register', 'RegisterController@show')->name('register.store');
  Route::post('register', 'RegisterController@register')->name('register');
  Route::post('register/code', 'RegisterController@code')->middleware(['throttle:60,1', 'front'])->name('register.code');
  Route::get('forget', 'ForgetController@show')->name('forget.show');
  Route::post('forget', 'ForgetController@store')->name('forget.store');
  Route::post('forget/code', 'ForgetController@code')->middleware(['throttle:60,1', 'front'])->name('forget.code');
  Route::get('login/wechat', 'WeChatController@redirectToProvider')->name('login.wechat');
  Route::get('login/wechat/callback', 'WeChatController@handleProviderCallback')->name('login.wechat.callback');
});

Route::get('admin', 'Site\SiteController@index')->name('admin')->middleware(['auth', 'system']);
Route::group(['prefix' => 'common', 'namespace' => 'Common', 'as' => 'common.'], function () {
  Route::post('upload/make', 'UploadController@make')->name('upload.make');
  Route::post('upload/wangEditor', 'UploadController@wangEditor')->name('upload.wangEditor');
  Route::post('upload/wangEditorMaterialNewsUpload/{wechat}', 'UploadController@wangEditorMaterialNewsUpload')->name('upload.wangEditorMaterialNewsUpload');
  Route::get('favorite/{model}/{id}/{module?}', 'FavoriteController@make')->name('favorite')->middleware('auth');
  Route::get('favour/{model}/{id}/{module?}', 'FavourController@make')->name('favour')->middleware('auth');
  Route::get('follower/{user}', 'FollowerController@make')->name('follower')->middleware('auth');
  Route::post('code/email', 'CodeController@email')->name('code.email')->middleware('auth');
  Route::post('code/mobile', 'CodeController@mobile')->name('code.mobile')->middleware('auth');
  Route::get('pay/sync/{module}', 'PayController@sync')->name('pay.sync');
  Route::any('pay/async/{module}', 'PayController@async')->name('pay.async');
  Route::any('pay/wepay/{module}', 'PayController@wepayAsync')->name('pay.wepay');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'system'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
  Route::get('system', 'HomeController@setting')->name('setting');
  Route::get('module', 'ModuleController@index')->name('module.index');
  Route::get('module/install/{name}', 'ModuleController@install')->name('module.install');
  Route::delete('module/uninstall/{module:name}', 'ModuleController@uninstall')->name('module.uninstall');
  Route::get('module/installed', 'ModuleController@installed')->name('module.installed');
  Route::get('template', 'TemplateController@index')->name('template.index');
  Route::get('template/install/{name}', 'TemplateController@install')->name('template.install');
  Route::delete('template/uninstall/{template:name}', 'TemplateController@uninstall')->name('template.uninstall');
  Route::get('template/installed', 'TemplateController@installed')->name('template.installed');
  Route::resource('package', 'PackageController')->except(['show']);
  Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
  Route::put('config/edit', 'ConfigController@update')->name('config.update');
  Route::any('config/upload', 'ConfigController@upload')->name('config.upload');
  Route::resource('group', 'GroupController');
  Route::get('my/edit', 'MyController@edit')->name('my.edit');
  Route::put('my/update', 'MyController@update')->name('my.update');
});

Route::group(['prefix' => 'site', 'namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth', 'site']], function () {
  Route::resource('site', 'SiteController');
  Route::get('{site}/config', 'ConfigController@edit')->name('config.edit');
  Route::put('{site}/config', 'ConfigController@update')->name('config.update');
  Route::resource('{site}/role', 'RoleController');
  Route::get('{site}/permission/{role}', 'PermissionController@edit')->name('permission.edit');
  Route::put('{site}/permission/{role}', 'PermissionController@update')->name('permission.update');
  Route::resource('{site}/admin', 'AdminController')->only(['index', 'destroy']);
  Route::get('{site}/admin/store/{admin}', 'AdminController@store')->name('admin.store');
  Route::post('{site}/search/admin', 'SearchController@admin')->name('search.admin');
  Route::get('{site}/admin/role/{user}', 'AdminController@role')->name('admin.role');
  Route::put('{site}/admin/role/{user}', 'AdminController@updateRole')->name('admin.role.update');
  Route::get('{site}/module', 'ModuleController@index')->name('module.index');
  Route::get('{site}/module/{module}', 'ModuleController@show')->name('module.show');
  Route::get('{site}/menu/{menu}', 'MenuController@show')->name('menu.show')->middleware('admin');
  Route::get('{site}/menu/type/{type}', 'MenuController@type')->name('menu.type')->middleware('admin');
});

Route::group(['prefix' => 'module', 'namespace' => 'Module', 'as' => 'module.', 'middleware' => ['auth', 'admin']], function () {
  Route::get('config', 'ConfigController@edit')->name('config.edit');
  Route::post('config', 'ConfigController@store')->name('config.store');
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

Route::any('wechat/bind/{model}', 'WeChatApi\ApiController@handle')->name('houdunren.wechat')->middleware('front');
Route::group(['prefix' => 'site/wechat/{site}', 'namespace' => 'WeChat', 'as' => 'wechat.', 'middleware' => ['auth']], function () {
  Route::resource('wechat', 'WeChatController');
  Route::get('wechat/default/{wechat}', 'DefaultController@edit')->name('default.edit');
  Route::put('wechat/default/{wechat}', 'DefaultController@update')->name('default.update');
  Route::get('wechat/menu/{wechat}', 'MenuController@edit')->name('menu.edit');
  Route::put('wechat/menu/{wechat}', 'MenuController@update')->name('menu.update');
  Route::get('wechat/menu/push/{wechat}', 'MenuController@push')->name('menu.push');
  Route::get('user/sync/{wechat}/{openid?}', 'UserSyncController@sync')->name('user.sync');
});

Route::group(['prefix' => 'wechat', 'namespace' => 'WeChat', 'as' => 'wechat.', 'middleware' => ['auth', 'admin']], function () {
  Route::resource('text', 'TextController');
  Route::resource('news', 'NewsController');
  Route::get('material/preview/{openid}/{material}', 'MaterialController@preview')->name('material.preview');
  Route::resource('material', 'MaterialController');
  Route::get('rule/wechat', 'RuleController@wechat');
  Route::resource('rule', 'RuleController')->only(['show', 'destroy']);
  Route::post('rule/check-keyword', 'RuleController@checkKeyword')->name('rule.keyword.check');
  Route::post('user/search/{wechat}', 'UserController@search')->name('user.search');
  Route::get('user/{wechat?}', 'UserController@index')->name('user.index');
});

Route::group(['prefix' => 'article', 'namespace' => 'Article', 'as' => 'article.', 'middleware' => ['site', 'admin']], function () {
  Route::resource('model', 'ModelController')->except('show');
  Route::resource('category', 'CategoryController')->shallow();
  Route::get('content/category', 'ContentController@category')->name('content.category');
  Route::get('content/create/{category}', 'ContentController@create')->name('content.create');
  Route::resource('content', 'ContentController')->except(['show', 'create'])->shallow();
  Route::resource('model.field', 'FieldController')->shallow();
  Route::get('{model}/system/field', 'SystemFieldController@index')->name('system.field.index');
  Route::get('{model}/system/field/edit/{name}', 'SystemFieldController@edit')->name('system.field.edit');
  Route::put('{model}/system/field/update/{name}', 'SystemFieldController@update')->name('system.field.update');
  Route::resource('template', 'TemplateController')->only('index');
  Route::get('template/set/{template}', 'TemplateController@set')->name('template.set');
});
