<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * 文章模型
 * @package App\Models
 */
class ArticleModel extends BaseModel
{
  protected $table = 'article_models';

  protected $fillable = ['title', 'description', 'site_id', 'content_fields'];

  protected  $casts = [
    'content_fields' => 'array'
  ];

  public $fieldConfig = [
    'title' => ['title' => '文章标题', 'name' => 'title', 'required' => false, 'placeholder' => '请输入标题', 'show' => 1, 'type' => 'input', 'options' => [], 'rules' => 'required', 'errors' => '标题长度为10到100个字符之间'],
    'thumb' => ['title' => '缩略图', 'name' => 'thumb', 'required' => false, 'placeholder' => '', 'show' => 1, 'type' => 'image', 'options' => [], 'rules' => '', 'errors' => ''],
    'description' => ['title' => '内容接要', 'name' => 'description', 'required' => 0, 'placeholder' => '文章内容接要', 'show' => 1, 'type' => 'textarea', 'options' => [], 'rules' => '', 'errors' => '内容介绍不能为10到100个字符之间'],
    'content' => ['title' => '文章内容', 'name' => 'content', 'required' => 0, 'placeholder' => '文章内容', 'show' => 1, 'type' => 'wangEditor', 'options' => [], 'rules' => 'required', 'errors' => ''],
    'url' => ['title' => '外部跳转链接', 'name' => 'url', 'required' => false, 'placeholder' => '内容跳转链接', 'show' => 1, 'type' => 'input', 'options' => [], 'rules' => '', 'errors' => '外部跳转链接错误'],
    'source' => ['title' => '来源', 'name' => 'source', 'required' => false, 'placeholder' => '文章来源', 'show' => 0, 'type' => 'input', 'options' => [], 'rules' => '', 'errors' => ''],
    'author' => ['title' => '作者', 'name' => 'author', 'required' => false, 'placeholder' => '文章作者', 'show' => 0, 'type' => 'input', 'default' => '', 'options' => [], 'rules' => '', 'errors' => ''],
  ];

  public function fields()
  {
    return $this->hasMany(ArticleField::class, 'model_id');
  }

  /**
   * 系统字段
   * @return Collection
   */
  public function getSystemFieldsAttribute()
  {
    return collect($this->fieldConfig)->map(function ($value, $field) {
      return ($this->content_fields[$field] ?? []) + $value;
    });
  }
}
