<?php return [
    'article' =>
        [
            'title'      => '文章管理',
            'icon'       => 'fa fa-navicon',
            'permission' => '权限标识',
            'menus'      =>
                [
                    [
                        'title'      => '栏目管理',
                        'permission' => '权限标识',
                        'url'        => '/article/category',
                    ],
                    [
                        'title'      => '文章管理',
                        'permission' => '',
                        'url'        => '/article/content',
                    ],
                    [
                        'title'      => '模板风格',
                        'permission' => '',
                        'url'        => '/article/template',
                    ],
                ],
        ],
];
