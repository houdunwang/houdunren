<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模型字段
 * @package App\Models
 */
class ArticleField extends Model
{
  protected $fillable = ['title', 'required', 'name', 'type', 'placeholder', 'options', 'site_id', 'model_id'];

  protected $casts = [
    'required' => 'boolean',
    'options' => 'array'
  ];

  public function model()
  {
    return $this->belongsTo(ArticleField::class, 'model_id');
  }
}
