<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块配置
 * @package App\Models
 */
class ModuleConfig extends Model
{
    protected $fillable = ['config', 'module_id', 'site_id'];

    protected $casts = [
        'config' => 'array',
    ];
}
