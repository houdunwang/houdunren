<?php
//后台管理菜单
return [
    [
        'name' => '系统设置',
        'icon' => 'fe fe-settings',
        'menus' => [
            [
                'name' => '系统配置',
                'route' => route('core.config.edit', ['name' => 'site']),
                'permission' => 'Core-config',
            ],
            [
                'name' => '系统权限列表',
                'route' => route('core.permission'),
                'permission' => 'Core-permission',
            ],
            [
                'name' => '角色管理',
                'route' => route('core.role.index'),
                'permission' => 'Core-role',
            ],
        ],
    ],
    [
        'name' => '网站会员管理',
        'icon' => 'fe fe-user',
        'menus' => [
            [
                'name' => '会员列表',
                'route' => route('core.user.index'),
                'permission' => 'Core-config',
            ],
        ],
    ],
    [
        'name' => '模块管理',
        'icon' => 'fe fe-grid',
        'menus' => [
            [
                'name' => '模块列表',
                'route' => route('core.module.index'),
                'permission' => 'Core-module',
            ],
        ],
    ],
];