<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置
 */
class Config extends Model
{
    protected $fillable = ['config'];

    protected $casts = ['config' => 'array'];
}
