<?php
//后台管理菜单
return [
    'icon' => 'flaticon-squares-4',
    'menus' => [
        [
            'name' => '系统配置',
            'route' => route('admin.config.edit', ['name' => 'site']),
            'permission' => 'Admin-config',
        ],
        [
            'name' => '系统权限列表',
            'route' => route('admin.permission'),
            'permission' => 'Admin-permission',
        ],
        [
            'name' => '角色管理',
            'route' => route('admin.role.index'),
            'permission' => 'Admin-role',
        ],
    ],
];