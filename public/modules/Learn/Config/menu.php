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
      'group' => ['title' => '实战视频', 'icon' => ''],
      'items' => [
        ['title' => '课程列表', 'to' => '链接地址', 'permission' => 'video'],
        ['title' => '发表课程', 'to' => '链接地址', 'permission' => 'create-video'],
        ['title' => '标签设置', 'to' => '链接地址', 'permission' => 'tag'],
      ]
    ],
    [
      'group' => ['title' => '系统课程', 'icon' => ''],
      'items' => [
        ['title' => '课程列表', 'to' => '链接地址', 'permission' => 'system'],
        ['title' => '发布课程', 'to' => '链接地址', 'permission' => 'create-system'],
      ]
    ],
    [
      'group' => ['title' => '订阅设置', 'icon' => ''],
      'items' => [
        ['title' => '会员定价', 'to' => '链接地址', 'permission' => 'member-price'],
        ['title' => '交易定单', 'to' => '链接地址', 'permission' => 'order']
      ]
    ],
    [
      'group' => ['title' => '直播设置', 'icon' => ''],
      'items' => [
        ['title' => '推流配置', 'to' => '链接地址', 'permission' => 'aliyun']
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
