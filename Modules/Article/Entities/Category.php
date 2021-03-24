<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Article\Entities\Model as ArticleModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Article\Database\factories\CategoryFactory;

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

    /**
     * 声明工厂类
     * @return Factory
     */
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function getTypeTitleAttribute()
    {
        return $this->types[$this->type];
    }

    public function getLevelAttribute()
    {
        return count(explode('-', $this->path)) - 2;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
        return self::where('path', 'like', $this->path . "-%")->get();
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
