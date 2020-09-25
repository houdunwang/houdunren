<?php
return [
  [
    'title' => '基本功能',
    'icon' => 'fab fa-windows',
    'show' => true,
    'items' => [['title' => '模块配置', 'permission' => 'core.config', 'url' => route('module.config.edit')]],
  ],
  [
    'title' => '微信消息',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'items' => [['title' => '文本消息', 'permission' => 'wechat.text', 'url' => route('wechat.text.index')], ['title' => '图文消息', 'permission' => 'wechat.news', 'url' => route('wechat.news.index')]],
  ],
  [
    'title' => '微信素材',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'items' => [['title' => '图片素材', 'permission' => 'wechat.material', 'url' => route('wechat.material.index', ['type' => 'image'])], ['title' => '音频素材', 'permission' => 'wechat.material', 'url' => route('wechat.material.index', ['type' => 'voice'])]],
  ],
];
