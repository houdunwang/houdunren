<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'site_num'];

    /**
     * 套餐列表
     * @return BelongsToMany
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    /**
     * 模块列表
     * @return mixed
     */
    public function getModulesAttribute()
    {
        return $this->packages()
            ->with('modules')
            ->get()
            ->mapWithKeys(function ($package) {
                return $package->modules;
            });
    }

    /**
     * 模板列表
     * @return mixed
     */
    public function getTemplatesAttribute()
    {
        return $this->packages()->with('templates')->get()->mapWithKeys(function ($package) {
            return $package->templates;
        });
    }
}
