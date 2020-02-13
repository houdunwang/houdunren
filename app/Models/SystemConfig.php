<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置
 * Class SystemConfig
 * @package App\Models
 */
class SystemConfig extends Model
{
    protected $guarded = [];
    protected $casts = ['config' => 'array'];
}