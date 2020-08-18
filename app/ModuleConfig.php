<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleConfig extends Model
{
    protected $fillable = ['config', 'module_id', 'site_id'];

    protected $casts = [
        'config' => 'array',
    ];
}
