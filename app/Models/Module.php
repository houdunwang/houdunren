<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模块
 * Class Module
 * @package App\Models
 */
class Module extends Model
{
    protected $fillable = [
        'title',
        'name',
        'package',
        'local',
        'permissions',
        'menus',
    ];
    protected $casts = [
        'package' => 'array',
        'permissions' => 'array',
        'menus' => 'array',
        'local' => 'boolean',
    ];

    public function domain()
    {
        return $this->hasOne(Domain::class);
    }
}
