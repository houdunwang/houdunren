<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员订阅
 * Class subscribe
 */
class Subscribe extends Model
{
    protected $table = 'edu_subscribe';
    protected $fillable = ['title', 'site_id', 'ad', 'icon', 'month', 'price'];
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
}
