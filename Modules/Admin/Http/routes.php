<?php
Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'],
    function () {
        Auth::routes();
    });

Route::group([
    'middleware' => ['web', 'auth:admin'],
    'prefix'     => 'admin',
    'namespace'  => 'Modules\Admin\Http\Controllers',
], function () {
    //后台主页
    Route::get('/', 'AdminController@index');

    //角色
    Route::resource('role', 'RoleController');
    Route::get('role/permission/{role}', 'RoleController@permission');
    Route::post('role/permission/{role}', 'RoleController@permissionStore');

    Route::resource('permission','PermissionController');
    //后台管理员
    Route::resource('user', 'UserController');
});
