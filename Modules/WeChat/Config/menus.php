<?php
return [
  [
    'title' => '微信消息',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'type' => 'wechat',
    'items' => [
      ['title' => '文本消息', 'permission' => 'text', 'url' => route('WeChat.admin.text.index')],
      ['title' => '图文消息', 'permission' => 'news', 'url' => route('WeChat.admin.news.index')]
    ],
  ],
  [
    'title' => '微信素材',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'type' => 'wechat',
    'items' => [
      ['title' => '图片素材', 'permission' => 'material.image', 'url' => route('WeChat.admin.material.index', ['type' => 'image'])],
      ['title' => '音频素材', 'permission' => 'material.voice', 'url' => route('WeChat.admin.material.index', ['type' => 'voice'])],
      ['title' => '图文素材', 'permission' => 'material.news', 'url' => route('WeChat.admin.material.index', ['type' => 'news'])]
    ],
  ],
  [
    'title' => '微信粉丝',
    'icon' => 'fas fa-user',
    'show' => true,
    'type' => 'wechat',
    'items' => [
      ['title' => '列表粉丝', 'permission' => 'user.index', 'url' => route('WeChat.admin.user.index')]
    ],
  ],
];
