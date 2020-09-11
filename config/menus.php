<?php
return [
    [
        'title' => '基本功能',
        'icon' => 'fab fa-windows',
        'show' => true,
        'items' => [
            ['title' => '模块配置', 'permission' => 'core.config', 'route' => 'module.config.edit'],
        ],
    ], [
        'title' => '微信公众号',
        'icon' => 'fab fa-weixin',
        'show' => true,
        'items' => [
            ['title' => '文本消息', 'permission' => 'wechat.text', 'route' => 'wechat.text.index'],
            ['title' => '图文消息', 'permission' => 'wechat.news', 'route' => 'wechat.news.index'],
            ['title' => '图文素材', 'permission' => 'wechat.material', 'route' => 'wechat.material.index'],
        ],
    ],
];
