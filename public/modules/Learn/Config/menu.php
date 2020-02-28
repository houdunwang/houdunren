<?php

/**
 * 菜单配置
 * admin:后台管理菜单
 * member:会员中心菜单
 * center:个人空间菜单
 * 注意：权限标识（permission）字段必须唯一
 */
return [
  'admin' => [
    [
      'category' => ['title' => '课程', 'icon' => ''],
      'menus' => [
        [
          'group' => ['title' => '实战视频'],
          'items' => [
            ['title' => '课程列表', 'to' => '链接地址', 'permission' => 'list-video'],
            ['title' => '发表课程', 'to' => '链接地址', 'permission' => 'create-video']
          ]
        ],
        [
          'group' => ['title' => '系统课程', 'name' => 'system'],
          'items' => [
            ['title' => '课程列表', 'to' => '链接地址', 'permission' => 'list-system'],
            ['title' => '发布课程', 'to' => '链接地址', 'permission' => 'create-system'],
          ]
        ]
      ]
    ],
    [
      'category' => ['title' => '交易', 'icon' => ''],
      'menus' => [
        [
          'group' => ['title' => '课程定价'],
          'items' => [
            ['title' => '会员定价', 'to' => '链接地址', 'permission' => 'order-price']
          ]
        ],
        [
          'group' => ['title' => '订单管理'],
          'items' => [
            ['title' => '定单列表', 'to' => '链接地址', 'permission' => 'order-list']
          ]
        ]
      ]
    ],
    [
      'category' => ['title' => '直播', 'icon' => ''],
      'menus' => [
        [
          'group' => ['title' => '直播设置'],
          'items' => [
            ['title' => '阿里云配置', 'to' => '链接地址', 'permission' => 'aliyun']
          ]
        ],
      ]
    ],
  ],
  //会员中心
  'member' => [
    ['title' => '我的定单', 'to' => '链接地址'],
  ],
  //个人空间
  'center' => [
    ['title' => 'TA的收藏', 'to' => '链接地址'],
    ['title' => 'TA的学习', 'to' => '链接地址'],
    ['title' => 'TA的签到', 'to' => '链接地址'],
  ],
];
