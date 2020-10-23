<?php
return [
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
