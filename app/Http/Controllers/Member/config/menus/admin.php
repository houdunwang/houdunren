<?php
//后台管理菜单
return [
    'icon' => 'flaticon-user',
    'menus' => [
        [
            'name' => '会员列表',
            'route' => route('member.user.index'),
            'permission' => 'Admin-config',
        ],
    ],
];