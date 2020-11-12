<?php

namespace Modules\Article\Entities;;

use App\Models\BaseModel;

/**
 * 文章内容模型
 * @package App\Models
 */
class ArticleContent extends BaseModel
{
  protected $fillable = ['site_id', 'user_id', 'category_id', 'title', 'thumb', 'description', 'content', 'url', 'source', 'fields'];

  protected $casts = ['fields' => 'array'];

  public function category()
  {
    return $this->belongsTo(ArticleCategory::class);
  }
}
