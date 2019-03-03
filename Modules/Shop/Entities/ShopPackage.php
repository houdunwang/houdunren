<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopPackage extends Model
{
    protected $fillable = ['path'];

    public function module()
    {
        return $this->hasMany(ShopModule::class, 'shop_module_id');
    }
}
