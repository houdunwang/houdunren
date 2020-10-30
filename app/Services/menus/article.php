<?php
return [
  [
    'title' => '模块配置',
    'show' => true,
    'icon' => 'fas fa-briefcase',
    'items' => [
      ['title' => '模板选择', 'url' => route('article.template.index'), 'permission' => 'site.template.manage'],
    ],
  ],
  [
    'title' => '内容管理',
    'icon' => 'fab fa-windows',
    'show' => true,
    'items' => [
      ['title' => '文章列表', 'permission' => 'article.content', 'url' => route('article.content.index')],
    ],
  ],
  [
    'title' => '基本功能',
    'icon' => 'fab fa-windows',
    'show' => true,
    'items' => [
      ['title' => '内容模型', 'permission' => 'article.model', 'url' => route('article.model.index')],
      ['title' => '栏目管理', 'permission' => 'article.category', 'url' => route('article.category.index')]
    ],
  ],
];
