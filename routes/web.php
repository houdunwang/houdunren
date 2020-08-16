<?php

use Illuminate\Support\Facades\Route;
use Yansongda\Pay\Pay;

Route::get('/', 'HomeController@index')->name('home');

Route::get('pay', function () {
    $config = [
        'app_id' => 'wxc47243ed572e273d', // 公众号 APPID
        'mch_id' => '1283388801', //商户号，请查看开户邮件
        'key' => 'ia94GS0kd6djls8BfEqC1io0NPeiqHqi',
        'notify_url' => 'http://yanda.net.cn/notify.php',
        // 'cert_client' => __DIR__ . '/../wx_cert/apiclient_cert.pem', // optional，退款等情况时用到
        // 'cert_key' =>  __DIR__ . '/../wx_cert/apiclient_cert.pem', // optional，退款等情况时用到
        'log' => [ // optional
            'file' => './logs/wechat.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
        ],
        // 'mode' => 'dev', // optional, dev/hk;当为 `hk` 时，为香港 gateway。
    ];
    $order = [
        'out_trade_no' => time(),
        'total_fee' => 0.1 * 100,
        'body' => 'test body - 测试',
        // 'openid' => 'onkVf1FjWS5SBIixxxxxxx',
    ];

    $pay = Pay::wechat($config)->scan($order);
    dump($pay->toArray());
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@show')->name('login');
    Route::post('login', 'LoginController@login')->name('login.store');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@show')->name('register.store');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('register/code', 'RegisterController@code')->middleware(['throttle:60,1', 'front'])->name('register.code');
    Route::get('forget', 'ForgetController@show')->name('forget.show');
    Route::post('forget', 'ForgetController@store')->name('forget.store');
    Route::post('forget/code', 'ForgetController@code')->middleware(['throttle:60,1', 'front'])->name('forget.code');

    Route::get('login/wechat', 'WeChatController@redirectToProvider');
    Route::get('login/wechat/callback', 'WeChatController@handleProviderCallback');
});

Route::get('admin', 'Site\SiteController@index')->name('admin')->middleware('auth');

Route::group(['prefix' => 'common', 'namespace' => 'Common', 'as' => 'common.'], function () {
    Route::post('upload/image', 'UploadController@image')->name('upload.image');
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
    Route::resource('package', 'PackageController')->except(['show']);
    Route::get('config/edit', 'ConfigController@edit')->name('config.edit');
    Route::put('config/edit', 'ConfigController@update')->name('config.update');
    Route::any('config/upload', 'ConfigController@upload')->name('config.upload');
    Route::resource('group', 'GroupController');
    Route::get('my/edit', 'MyController@edit')->name('my.edit');
    Route::put('my/update', 'MyController@update')->name('my.update');
});

Route::group(['prefix' => 'site', 'namespace' => 'Site', 'as' => 'site.', 'middleware' => ['auth', 'system']], function () {
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
