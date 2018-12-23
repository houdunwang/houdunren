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
        [
            'name' => '管理员',
            'route' => route('admin.user.index'),
            'permission' => 'Admin-manage',
        ],
        [
            'name' => '积分配置',
            'route' => route('admin.credit.create'),
            'permission' => 'Admin-credit',
        ],
        [
            'name' => '模块管理',
            'route' => route('admin.module.index'),
            'permission' => 'Admin-module',
        ],
    ],
];