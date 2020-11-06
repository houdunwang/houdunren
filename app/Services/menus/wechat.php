<?php
return [
  [
    'title' => '微信消息',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'type' => 'wechat',
    'items' => [['title' => '文本消息', 'permission' => 'wechat.text', 'url' => route('wechat.text.index')], ['title' => '图文消息', 'permission' => 'wechat.news', 'url' => route('wechat.news.index')]],
  ],
  [
    'title' => '微信素材',
    'icon' => 'fab fa-weixin',
    'show' => true,
    'type' => 'wechat',
    'items' => [['title' => '图片素材', 'permission' => 'wechat.material.image', 'url' => route('wechat.material.index', ['type' => 'image'])], ['title' => '音频素材', 'permission' => 'wechat.material.voice', 'url' => route('wechat.material.index', ['type' => 'voice'])], ['title' => '图文素材', 'permission' => 'wechat.material.news', 'url' => route('wechat.material.index', ['type' => 'news'])]],
  ],
  [
    'title' => '微信粉丝',
    'icon' => 'fas fa-user',
    'show' => true,
    'type' => 'wechat',
    'items' => [['title' => '列表粉丝', 'permission' => 'wechat.user.index', 'url' => route('wechat.user.index')]],
  ],
];
