<?php
//后台管理菜单
return [
    'icon' => 'flaticon-file-2',
    'menus' => [
        [
            'name' => '模块配置',
            'route' => route('content.config.edit'),
            'permission' => 'Content-config',
        ],
        [
            'name' => '风格模板',
            'route' => route('content.template.index'),
            'permission' => 'Content-template',
        ],
        [
            'name' => '文章管理',
            'route' => route('content.article.index'),
            'permission' => 'Content-article',
        ],
        [
            'name' => '栏目分类',
            'route' => route('content.category.index'),
            'permission' => 'Content-category',
        ],
        [
            'name' => '内容模型',
            'route' => route('content.model.index'),
            'permission' => 'Content-model',
        ],
        [
            'name' => '幻灯片管理',
            'route' => route('content.slide.index'),
            'permission' => 'Content-slide',
        ],
    ],
];