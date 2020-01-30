<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 站点管理
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    protected $guarded = [];

    public function weChat()
    {
        return $this->hasMany(WeChat::class);
    }
}
