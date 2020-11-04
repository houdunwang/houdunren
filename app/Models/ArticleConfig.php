<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleConfig extends BaseModel
{
  protected $fillable = ['site_id', 'config', 'domain'];

  protected $casts = [
    'config' => 'array'
  ];
}
