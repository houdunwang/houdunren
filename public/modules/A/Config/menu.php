<?php

/**
 * 菜单配置
 * admin:后台管理菜单
 * member:会员中心菜单
 * center:个人空间菜单
 * 注意：
 * 权限标识（permission）字段必须唯一
 * member/center不需要设置权限字段
 */
return [
  'admin' => [
    '课程管理' => [
      ['title' => '实战视频', 'url' => '链接地址', 'permission' => 'video-lesson', 'show' => true],
      ['title' => '系统课程', 'url' => '链接地址', 'permission' => 'system-lesson', 'show' => true]
    ]
  ],
  'member' => [
    ['title' => '我的定单', 'url' => '链接地址',  'show' => true],
  ],
  'center' => [
    ['title' => 'TA的签到', 'url' => '链接地址',  'show' => true],
  ],
];
