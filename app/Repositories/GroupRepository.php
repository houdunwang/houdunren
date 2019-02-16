<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-16
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;


use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

class GroupRepository extends Repository
{
    protected $model = Group::class;

    public function create(array $attributes)
    {
        $group = parent::create($attributes);
        return $group->package()->sync(request()->input('packages'));
    }

    public function save(Model $model, array $attributes)
    {
         parent::update($model, $attributes);
        return $model->package()->sync(request()->input('packages'));
    }

}