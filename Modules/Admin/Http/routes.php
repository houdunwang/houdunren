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
    Route::resource('role', 'RoleController')->middleware("permission:admin,resource");
    Route::get('role/permission/{role}', 'RoleController@permission')->middleware("permission:admin");
    Route::post('role/permission/{role}', 'RoleController@permissionStore')->middleware("permission:admin");

    Route::resource('permission','PermissionController');
    //后台管理员
    Route::resource('user', 'UserController');
});


//module-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'admin','namespace'=>"Modules\Admin\Http\Controllers"],
function () {
    Route::resource('module', 'ModuleController')->middleware("permission:admin,resource");
});
