<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * 文章模型
 * @package App\Models
 */
class Model extends BaseModel
{
    use HasFactory;

    protected $table = 'article_models';

    protected $fillable = ['title', 'fields', 'site_id', 'user_id'];

    protected $casts = [
        'fields' => 'array'
    ];
}
