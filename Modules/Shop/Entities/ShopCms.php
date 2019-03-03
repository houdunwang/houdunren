<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * cms应用
 * Class ShopCms
 * @package Modules\Shop\Entities
 */
class ShopCms extends Model
{
    protected $fillable = ['build', 'total', 'logs', 'files'];
    protected $casts = ['files' => 'array', 'logs' => 'array'];
}
