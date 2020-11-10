<?php

namespace Modules\Article\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ArticleConfig extends BaseModel
{
  protected $fillable = ['site_id', 'config', 'domain'];

  protected $casts = [
    'config' => 'array'
  ];
}
