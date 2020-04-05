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
    '菜单组' => [
      ['title' => '菜单标题', 'url' => '链接地址', 'permission' => '权限标识', 'show' => true],
    ]
  ],
  'member' => [
    ['title' => '我的定单', 'url' => '链接地址',  'show' => true],
    ['title' => '会员到期时间', 'url' => '链接地址',  'show' => true],
  ],
  'center' => [
    ['title' => 'TA的签到', 'url' => '链接地址',  'show' => true],
  ],
];
