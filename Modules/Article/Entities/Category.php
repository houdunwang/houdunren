<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 栏目
 * @package Modules\Article\Entities
 */
class Category extends Model
{
    use HasFactory;
    protected $table = 'article_categories';
    protected $fillable = [
        'site_id', 'model_id',  'type', 'pid', 'path', 'title', 'keywords', 'description', 'preview',
        'url', 'content', 'index_template', 'list_template', 'content_template', 'user_id'
    ];
    protected $casts = [
        'type' => 'boolean',
    ];

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
    public function model()
    {
        return $this->belongsTo(Model::class);
    }
}
