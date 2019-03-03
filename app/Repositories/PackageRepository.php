<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;

/**
 * 套餐管理
 * Class PackageRepository
 * @package App\Repositories
 */
class PackageRepository extends Repository
{
    protected $model = Package::class;

    public function create(array $attributes)
    {
        \DB::transaction(function () use ($attributes) {
            $model = parent::create($attributes);
            $model->module()->sync($attributes['modules'] ?? []);
            $model->template()->sync($attributes['templates'] ?? []);
        });
    }

    public function update(Model $model, array $attributes)
    {
        \DB::transaction(function () use ($model, $attributes) {
            parent::update($model, $attributes);
            $model->module()->sync($attributes['modules'] ?? []);
            $model->template()->sync($attributes['templates'] ?? []);
        });
    }
}