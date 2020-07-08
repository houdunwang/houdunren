<?php
return [
    [
        'title' => '基本设置',
        'icon' => 'fas fa-fw fa-table',
        'show' => true,
        'items' => [
            ['title' => '内容标签设置', 'permission' => 'tag'],
            ['title' => '直播推流配置', 'permission' => 'live'],
        ],
    ],
    [
        'title' => '课程管理',
        'icon' => 'fas fa-fw fa-table',
        'show' => true,
        'items' => [
            ['title' => '视频课程列表', 'permission' => 'lesson-index'],
            ['title' => '发表视频课程', 'permission' => 'lesson-add'],
        ],
    ],
    [
        'title' => '系统课程',
        'show' => true,
        'items' => [
            ['title' => '系统课程列表', 'permission' => 'system-lesson'],
            ['title' => '发布系统课程', 'permission' => 'system-lesson-add'],
        ],
    ],
    [
        'title' => '订阅设置',
        'show' => true,
        'items' => [
            ['title' => '会员周期定价', 'permission' => 'subscribe'],
            ['title' => '订阅订单管理', 'permission' => 'orders'],
        ],
    ],
];
