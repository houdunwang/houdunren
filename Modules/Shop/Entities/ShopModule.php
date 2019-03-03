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
        return $this->belongsTo(User::class,'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'shop_user_modules', 'user_id', 'module_id')->withTimestamps();
    }

    public function getLogListAttribute()
    {
        preg_match_all('/(.*)/', $this['logs'], $maths);
        return array_filter($maths[0]);
    }
}
