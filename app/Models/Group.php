<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户组
 * Class Group
 * @package App\Models
 */
class Group extends Model
{
    protected $guarded = [];
    protected $casts = ['site_num' => 'integer', 'system' => 'boolean', 'package_id' => 'array'];

    /**
     * 获取套餐
     * @return mixed
     */
    public function package()
    {
        return Package::whereIn('id', $this['package_id'])->get();
    }
}
