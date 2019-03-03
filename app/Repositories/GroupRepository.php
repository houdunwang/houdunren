<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

/**
 * 后台管理组
 * Class GroupRepository
 * @package App\Repositories
 */
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