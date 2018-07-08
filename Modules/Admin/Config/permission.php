<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 权限配置
 * 为了避免其他模块有同名的权限，权限标识要以 '模块标识::' 开始
 */
return [
    [
        'group'       => '系统管理',
        'permissions' => [
            ['title' => '角色管理', 'name' => 'Modules\Admin\Http\Controllers\RoleController@index', 'guard' => 'admin'],
        ],
    ],
    [
        'group'       => '管理员管理',
        'permissions' => [
            ['title' => '角色管理', 'name' => 'Modules\Admin\Http\Controllers\RoleController@index', 'guard' => 'admin'],
            ['title' => '添加角色', 'name' => 'Modules\Admin\Http\Controllers\RoleController@create', 'guard' => 'admin'],
            ['title' => '编辑角员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@edit', 'guard' => 'admin'],
            ['title' => '删除角员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@destory', 'guard' => 'admin'],
            ['title' => '设置角色权限', 'name' => 'Modules\Admin\Http\Controllers\RoleController@permission', 'guard' => 'admin'],
        ],
    ],
];
