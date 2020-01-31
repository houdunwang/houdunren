<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 套餐管理
 * Class Package
 * @package App\Models
 */
class Package extends Model
{
    protected $guarded = [];
    protected $casts = ['modules' => 'array', 'templates' => 'array'];

    /**
     * 套餐模块
     * @return mixed
     */
    public function modules()
    {
        return Module::whereIn('id', $this['modules'])->get();
    }
}
