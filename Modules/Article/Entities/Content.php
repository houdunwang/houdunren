<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 文章
 * @package Modules\Article\Entities
 */
class Content extends Model
{
    use HasFactory;
    protected $table = 'article_contents';
    protected $fillable = ['title', 'site_id',  'content', 'source', 'thumb', 'description'];
    protected $casts = [];
    protected $appends = ['permissions'];

    /**
     * 操作权限
     * @return bool[]
     * @throws BindingResolutionException
     */
    public function getPermissionsAttribute()
    {
        return [
            'create' => Auth::check() && Auth::user()->can('create', $this),
            'update' => Auth::check() && Auth::user()->can('update', $this),
            'delete' => Auth::check() && Auth::user()->can('delete', $this),
        ];
    }

    /**
     * 标签的关联
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag_content')->withTimestamps();
    }
}
