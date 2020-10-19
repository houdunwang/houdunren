<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章模型
 * @package App\Models
 */
class ArticleModel extends BaseModel
{
  protected $table = 'article_models';

  protected $fillable = ['title', 'description', 'site_id'];



  public function fields()
  {
    return $this->hasMany(ArticleField::class, 'model_id');
  }
}
