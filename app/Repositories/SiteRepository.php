<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-16
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Site;

class SiteRepository extends Repository
{
    protected $model = Site::class;

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        if (isSuperAdmin()) {
            return parent::paginate($row, $columns, $latest);
        }
        return auth()->user()->site;
    }

    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        $model->user()->save(auth()->user(), ['role' => 'admin']);
    }

    /**
     * 获取站点套餐
     * @param Site $site
     * @return mixed
     */
    public function packages(Site $site)
    {
        return $site->user()->wherePivot('role', 'admin')->first()->group->package;
    }

    /**
     * 更新所有站点模块权限
     * @return Site[]|\Illuminate\Database\Eloquent\Collection
     */
    public function loadAllSitePermission()
    {
        return Site::all()->each(function ($site) {
            (new PermissionRepository())->loadModulePermissions($site);
        });
    }
}