<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

/**
 * 文章模板
 * @package App\Models
 */
class Template extends Model
{
    protected $fillable = ['title', 'name', 'description', 'version', 'author', 'preview'];

    /**
     * 预览图
     * @return UrlGenerator|string
     * @throws BindingResolutionException
     */
    public function getPreviewAttribute()
    {
        return url("templates/{$this->name}/preview.jpg");
    }
}
