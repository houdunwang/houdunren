<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-08
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Exceptions\InvalidParamException;
use App\Http\Requests\UserRequest;
use App\Models\Module;
use App\Models\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * 会员管理仓库
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    protected $model = User::class;

    protected function formatAttribute(array $attributes): array
    {
        $attributes = array_filter($attributes);
        if (isset($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        }
        return $attributes;
    }

    public function create(array $attributes)
    {
        $attributes = $this->formatAttribute($attributes);
        $attributes['lock'] = false;
        $attributes['admin_end'] = (new Carbon())->addDays(config_get('register.days', 7));
        $attributes['group_id'] = config_get('register.group_id', 1);
        return parent::create($attributes);
    }

    public function update(Model $model, array $attributes)
    {
        return parent::update($model, $this->formatAttribute($attributes));
    }

    public function modules(?Site $site, User $user)
    {
        //站长获取所有模块
        if ($site->admin['id'] == $user['id']) {
            $modules = collect();
            foreach ($user->group->package as $package) {
                $modules = $modules->merge($package->module);
            }
            return $modules;
        }
        //操作员返回指定模块
        $modules = $user->getAllPermissions()->where('site_id', $site['id'])->pluck('module')->unique()->toArray();
        return Module::whereIn('name', $modules)->get();
    }
}