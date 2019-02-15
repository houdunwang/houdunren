<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-15
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;

class PackageRepository extends Repository
{
    protected $model = Package::class;

    public function create(array $attributes)
    {
        return parent::create($attributes);
    }

    public function update(Model $model, array $attributes)
    {
        return parent::save($model, $attributes);
    }
}