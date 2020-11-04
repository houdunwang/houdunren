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
    'title' => ['title' => '文章标题', 'name' => 'title', 'required' => 0, 'placeholder' => '请输入标题', 'show' => 1, 'type' => 'input', 'options' => []],
    'thumb' => ['title' => '缩略图', 'name' => 'thumb', 'required' => 0, 'placeholder' => '', 'show' => 1, 'type' => 'image', 'options' => []],
    'description' => ['title' => '内容接要', 'name' => 'description', 'required' => 0, 'placeholder' => '文章内容接要', 'show' => 1, 'type' => 'textarea', 'options' => []],
    'content' => ['title' => '文章内容', 'name' => 'content', 'required' => 0, 'placeholder' => '文章内容', 'show' => 1, 'type' => 'wangEditor', 'options' => []],
    'url' => ['title' => '外部跳转链接', 'name' => 'url', 'required' => 0, 'placeholder' => '内容跳转链接', 'show' => 1, 'type' => 'input', 'options' => []],
    'source' => ['title' => '来源', 'name' => 'source', 'required' => 0, 'placeholder' => '文章来源', 'show' => 0, 'type' => 'input', 'options' => []],
    'author' => ['title' => '作者', 'name' => 'author', 'required' => 0, 'placeholder' => '文章作者', 'show' => 0, 'type' => 'input', 'default' => '', 'options' => []],
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
    return collect($this->fieldConfig)->map(fn ($value, $field) => ($this->content_fields[$field] ?? []) + $value);
  }
}
