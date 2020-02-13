<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 站点配置
 * Class SiteConfig
 * @package App\Models
 */
class SiteConfig extends Model
{
    protected $guarded = [];
    protected $casts = ['config' => 'array'];
}
