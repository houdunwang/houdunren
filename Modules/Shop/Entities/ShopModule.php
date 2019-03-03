<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopModule extends Model
{
    protected $fillable = ['title', 'user_id', 'name', 'thumb', 'version', 'logs', 'description', 'thumb', 'package'];
    protected $casts = ['package' => 'array'];

    public function packages()
    {
        return $this->hasMany(ShopPackage::class, 'shop_module_id');
    }
}
