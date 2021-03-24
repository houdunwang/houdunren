<?php
return [
    [
        'title' => '基础设置',
        'icon' => 'fab fa-app-store-ios',
        'show' => true,
        'items' => [
            ['title' => '模块配置', 'permission' => 'config'],
            ['title' => '内容标签', 'permission' => 'tag'],
        ],
    ],
    [
        'title' => '课程管理',
        'icon' => 'fas fa-camera',
        'show' => true,
        'items' => [
            ['title' => '课程列表', 'permission' => 'lesson'],
            ['title' => '发布课程', 'permission' => 'lesson']
        ],
    ],
    [
        'title' => '系统课程',
        'icon' => 'fa fa-magnet',
        'show' => true,
        'items' => [
            ['title' => '系统课程列表', 'permission' => 'system-lesson'],
            ['title' => '发布系统课程', 'permission' => 'system-lesson']
        ],
    ],
    [
        'title' => '订阅设置',
        'icon' => 'fa fa-tasks',
        'show' => true,
        'items' => [
            ['title' => '会员周期定价', 'permission' => 'subscribe'],
            ['title' => '订阅订单管理', 'permission' => 'orders'],
        ],
    ],
];
