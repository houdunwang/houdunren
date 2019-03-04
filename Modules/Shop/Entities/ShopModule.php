<?php

namespace Modules\Shop\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShopModule extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'name',
        'thumb',
        'version',
        'logs',
        'description',
        'thumb',
        'package',
        'content',
    ];
    protected $casts = ['package' => 'array'];

    public function packages()
    {
        return $this->hasMany(ShopPackage::class, 'shop_module_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'shop_user_modules',  'module_id','user_id')->withTimestamps();
    }

    public function getLogListAttribute()
    {
        preg_match_all('/(.*)/', $this['logs'], $maths);
        return array_filter($maths[0]);
    }

    /**
     * 获取最新压缩包
     * @return mixed
     */
    public function lastZip()
    {
        return $this->packages->sortByDesc(function ($package) {
            return (int)$package['id'];
        })->values()->first();
    }
}
