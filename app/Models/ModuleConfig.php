<?php

namespace App\Models;

/**
 * 模块配置
 * @package App\Models
 */
class ModuleConfig extends BaseModel
{
    protected $fillable = ['config', 'module_id', 'site_id'];

    protected $casts = [
        'config' => 'array',
    ];
}
