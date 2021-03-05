<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 标签管理
 * @package Modules\Edu\Entities
 */
class Tag extends Model
{
    protected $table = 'edu_tag';
    protected $fillable = ['id', 'title', 'site_id'];

    /**
     * 用户关联
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 内容
     * @return BelongsToMany
     */
    public function contents()
    {
        return $this->belongsToMany(Content::class, 'article_tag_content');
    }
}
