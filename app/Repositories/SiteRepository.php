<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Site;

/**
 * 站点管理
 * Class SiteRepository
 * @package App\Repositories
 */
class SiteRepository extends Repository
{
    protected $model = Site::class;

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        if (isSuperAdmin()) {
            return parent::paginate(100, $columns, $latest);
        }

        return auth()->user()->sites()->wherePivotIn('role', ['admin', ''])->get();
    }

    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        $model->user()->save(auth()->user(), ['role' => 'admin']);
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