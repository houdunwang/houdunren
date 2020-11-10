<?php
return [
  [
    'title' => '模块配置',
    'show' => true,
    'icon' => 'fas fa-briefcase',
    'items' => [
      // ['title' => '基本配置', 'url' => route('article.config.edit'), 'permission' => 'article.config.edit'],
      ['title' => '基本配置', 'url' => route('module.config.edit'), 'permission' => 'config.edit'],
      ['title' => '模板选择', 'url' => route('article.admin.template.index'), 'permission' => 'template.manage'],
    ],
  ],
  [
    'title' => '内容管理',
    'icon' => 'fab fa-windows',
    'show' => true,
    'items' => [
      ['title' => '文章列表', 'permission' => 'content.index', 'url' => route('article.admin.content.index')],
      ['title' => '发表文章', 'permission' => 'content.create', 'url' => route('article.admin.content.category')],
    ],
  ],
  [
    'title' => '基本功能',
    'icon' => 'fab fa-windows',
    'show' => true,
    'items' => [
      ['title' => '内容模型', 'permission' => 'model.index', 'url' => route('article.admin.model.index')],
      ['title' => '栏目管理', 'permission' => 'category.index', 'url' => route('article.admin.category.index')]
    ],
  ],
];
