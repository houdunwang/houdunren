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
      'group' => ['title' => '基本设置', 'icon' => ''],
      'items' => [
        ['title' => '内容标签设置', 'to' => '/edu/admin/tag', 'permission' => 'tag'],
        ['title' => '直播推流配置', 'to' => '链接地址', 'permission' => 'aliyun']
      ]
    ],
    [
      'group' => ['title' => '实战视频', 'icon' => 'fa-life-ring'],
      'items' => [
        ['title' => '视频课程列表', 'to' => '/edu/admin/lesson', 'permission' => 'video'],
        ['title' => '发表视频课程', 'to' => '/edu/admin/lesson/create', 'permission' => 'create-video'],
      ]
    ],
    [
      'group' => ['title' => '系统课程', 'icon' => 'fa-graduation-cap'],
      'items' => [
        ['title' => '系统课程列表', 'to' => '/edu/admin/system', 'permission' => 'system'],
        ['title' => '发布系统课程', 'to' => '/edu/admin/system/create', 'permission' => 'create-system'],
      ]
    ],
    [
      'group' => ['title' => '订阅设置', 'icon' => 'fa-shopping-bag'],
      'items' => [
        ['title' => '会员周期定价', 'to' => '/edu/admin/subscribe', 'permission' => 'subscribe'],
        ['title' => '订阅定单管理', 'to' => '链接地址', 'permission' => 'order']
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
