<?php return [
    [
        'title'      => '系统管理',
        'icon'       => 'fa fa-cubes',
        'permission' => [
            'Modules\\Admin\\Http\\Controllers\\RoleController@index',
        ],
        'menus'      => [
            [
                'title'      => '网站基本配置',
                'permission' => 'Modules\\Admin\\Http\\Controllers\\RoleController@index',
                'url'        => '/admin/role',
            ],
            [
                'title'      => '邮箱配置',
                'permission' => '',
                'url'        => '/admin/module',
            ],
        ],
    ],
    [
        'title'      => '权限角色',
        'icon'       => 'fa fa-user-circle-o',
        'permission' => [
            'Modules\\Admin\\Http\\Controllers\\RoleController@index',
        ],
        'menus'      => [
            [
                'title'      => '角色列表',
                'permission' => 'Modules\\Admin\\Http\\Controllers\\RoleController@index',
                'url'        => '/admin/role',
            ],
            [
                'title'      => '管理员管理',
                'permission' => 'Modules\\Admin\\Http\\Controllers\\RoleController@index',
                'url'        => '/admin/user',
            ],
        ],
    ],
    [
        'title'      => '模块插件',
        'icon'       => 'fa fa-university',
        'permission' => [
            'Modules\\Admin\\Http\\Controllers\\RoleController@index',
        ],
        'menus'      => [
            [
                'title'      => '模块管理',
                'permission' => '',
                'url'        => '/admin/module',
            ],
        ],
    ],
];
