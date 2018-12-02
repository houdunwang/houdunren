<?php
//后台管理菜单
return [
    'icon' => 'flaticon-presentation-1',
    'menus' => [
        [
            'name' => '模块配置',
            'route' => route('edu.config.edit'),
            'permission' => 'Edu-lesson',
        ],
        [
            'name' => '帖子分类',
            'route' => route('edu.category.index'),
            'permission' => 'Edu-category',
        ],
        [
            'name' => '标签管理',
            'route' => route('edu.tag.index'),
            'permission' => 'Edu-tag',
        ],
        [
            'name' => '课程管理',
            'route' => route('edu.lesson.index'),
            'permission' => 'Edu-lesson',
        ],
        [
            'name' => '系统课程',
            'route' => route('edu.system.index'),
            'permission' => 'Edu-system-lesson',
        ]
    ],
];