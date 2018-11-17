<?php
//后台管理菜单
return [
    [
        'name' => '内容管理',
        'icon' => 'fe fe-video',
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
        ],
    ],
    [
        'name' => '会员订单管理',
        'icon' => 'fe fe-shopping-bag',
        'menus' => [
            [
                'name' => '会员订单',
                'route' => route('edu.lesson.index'),
                'permission' => 'Edu-order',
            ],
        ],
    ],
];