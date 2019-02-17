<?php
return [
    'name' => '测试模块',
    /**
     * 此模块是否存在配置参数
     * 系统会对每个模块设置独立的配置项模块间互不影响
     */
    'config' => true,
    //当访问域名时直接访问到模块
    'domain' => true,
    //
    'weChat' => [
        'reply' => true,
        'entry' => true,
    ],
    'permissions' => [
        ['name' => 'user-manage', 'title' => '会员管理'],
    ],
    'menus' => [
        '课程管理' => [
            ['title' => '会员列表', 'route' => '', 'permission' => 'user-manage'],
        ],
    ],
];