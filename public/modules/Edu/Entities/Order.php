<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;

/**
 * 定单管理
 * @package Modules\Edu\Entities
 */
class Order extends Model
{
    protected $table = 'edu_order';
    protected $fillable = ['site_id', 'user_id', 'price', 'subject', 'sn', 'type', 'month', 'lesson_id', 'status'];
    protected $casts = [
        'status' => 'boolean'
    ];
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
}
