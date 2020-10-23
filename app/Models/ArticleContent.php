<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章内容模型
 * @package App\Models
 */
class ArticleContent extends Model
{
  protected $fillable = ['site_id', 'user_id', 'category_id', 'title', 'thumb', 'description', 'content', 'url', 'source', 'fields'];

  protected $casts = ['fields' => 'array'];
}
