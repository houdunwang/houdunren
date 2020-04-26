<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;

/**
 * 点赞
 * @package Modules\Edu\Entities
 */
class Favour extends Model
{
    protected $table = 'edu_favour';
    protected $fillable = ['user_id'];

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
}
