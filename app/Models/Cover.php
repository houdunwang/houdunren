<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块封面入口
 * Class Cover
 * @package App\Models
 */
class Cover extends Model
{
    protected $fillable = [
        'title',
        'discription',
        'picurl',
        'url',
        'site_id',
        'module_id',
    ];
    public function keyword()
    {
        return $this->morphOne(Keyword::class, 'model');
    }
}
