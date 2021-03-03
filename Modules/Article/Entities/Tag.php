<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 标签
 * @package Modules\Article\Entities
 */
class Tag extends Model
{
    use HasFactory;
    protected $table = 'article_tags';
    protected $fillable = ['title', 'site_id'];
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
}
