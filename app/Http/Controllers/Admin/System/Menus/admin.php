<?php
//后台管理菜单
return [
    [
        'name' => '系统设置',
        'icon' => 'fe fe-settings',
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
    ],
    [
        'name' => '网站会员管理',
        'icon' => 'fe fe-user',
        'menus' => [
            [
                'name' => '会员列表',
                'route' => route('admin.user.index'),
                'permission' => 'Admin-config',
            ],
        ],
    ],
    [
        'name' => '模块管理',
        'icon' => 'fe fe-grid',
        'menus' => [
            [
                'name' => '模块列表',
                'route' => route('admin.module.index'),
                'permission' => 'Admin-module',
            ],
        ],
    ],
];