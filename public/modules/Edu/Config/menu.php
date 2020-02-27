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
    '内容管理' => [
      ['title' => '栏目设置', 'url' => '链接地址', 'permission' => 'category', 'show' => true],
    ],
  ],
];
