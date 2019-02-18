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
    protected $fillable = ['name', 'site_num'];
    protected $casts = ['package' => 'array', 'system' => 'bool'];

    /**
     * 组套餐
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function package()
    {
        return $this->belongsToMany(Package::class)->withTimestamps();
    }
}
