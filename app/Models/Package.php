<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 套餐模型
 * @package App\Models
 */
class Package extends Model
{
    protected $fillable = ['title'];

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    /**
     * 模块关联
     * @return BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }
}
