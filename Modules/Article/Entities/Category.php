<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Article\Entities\Model as ArticleModel;

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
        'pid' => 'integer',
    ];
    protected $types = [1 => '普通栏目', 2 => '封面栏目', 3 => '单文章', 4 => '外部链接'];

    protected $appends = ['permissions', 'typeTitle', 'level'];

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

    public function getTypeTitleAttribute()
    {
        return $this->types[$this->type];
    }

    public function getLevelAttribute()
    {
        return count(explode('-', $this->path)) - 2;
    }

    /**
     * 标签的关联
     * @return BelongsToMany
     */
    public function model()
    {
        return $this->belongsTo(ArticleModel::class);
    }

    /**
     * 父级栏目
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'pid');
    }

    /**
     * 子栏目
     * @return mixed
     */
    public function getChildrensAttribute()
    {
        return self::where('path', 'like', "%-{$this->id}-%")->get();
    }
}
