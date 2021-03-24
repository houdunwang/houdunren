<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 会员组
 * @package App\Models
 */
class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'site_num', 'days'];

    /**
     * 套餐列表
     * @return BelongsToMany
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class)->withTimestamps();
    }

    /**
     * 可使用模块
     * @return void
     */
    public function getModulesAttribute()
    {
        return $this->packages->load('modules')
            ->mapWithKeys(function ($package) {
                return $package->modules;
            })->unique(fn ($module) => $module->id);
    }
}
