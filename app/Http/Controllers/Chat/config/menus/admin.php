<?php
//后台管理菜单
return [
    'icon' => 'flaticon-user',
    'menus' => [
        [
            'name' => '普通文本消息',
            'route' => route('chat.base.index'),
            'permission' => 'Chat-text',
        ],
        [
            'name' => '图文消息',
            'route' => route('chat.news.index'),
            'permission' => 'Chat-news',
        ],
        [
            'name' => '微信菜单管理',
            'route' => route('chat.button.index'),
            'permission' => 'Chat-button',
        ],
        [
            'name' => '系统消息设置',
            'route' => route('chat.default.create'),
            'permission' => 'Chat-system_message',
        ],
    ],
];