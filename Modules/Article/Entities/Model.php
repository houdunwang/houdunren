<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as SystemModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

/**
 * 文章模型
 * @package App\Models
 */
class Model extends SystemModel
{
    use HasFactory;

    protected $table = 'article_models';
    protected $fillable = ['title', 'fields', 'site_id', 'user_id'];
    protected $casts = [
        'fields' => 'array'
    ];

    /**
     * 栏目关联
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 文章关联
     * @return HasMany
     */
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
