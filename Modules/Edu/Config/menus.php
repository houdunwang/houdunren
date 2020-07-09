<?php
return [
    [
        'title' => '基本设置',
        'icon' => 'fas fa-fw fa-table',
        'show' => true,
        'items' => [
            ['title' => '内容标签管理', 'permission' => 'tag', 'route' => 'Edu.admin.tag.edit'],
            ['title' => '直播推流配置', 'permission' => 'live'],
        ],
    ],
    [
        'title' => '课程管理',
        'icon' => 'fas fa-fw fa-table',
        'show' => true,
        'items' => [
            ['title' => '课程列表', 'permission' => 'lesson-index', 'route' => 'Edu.admin.lesson.index'],
            ['title' => '发布课程', 'permission' => 'lesson-add', 'route' => 'Edu.admin.lesson.create'],
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
