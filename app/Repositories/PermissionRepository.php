<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-18
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Module;
use App\Models\Site;
use Spatie\Permission\Models\Permission;
use Storage;

/**
 * 站点权限
 * Class PermissionRepository
 * @package App\Repositories
 */
class PermissionRepository extends Repository
{
    protected $model = Permission::class;

    /**
     * 获取站点所有分层权限
     * @param Site $site
     * @return mixed
     */
    public function permissions(Site $site)
    {
        $permissions = collect();
        foreach (Module::all() as $module) {
            $permissions->put(
                $module['title'],
                Permission::where([['site_id', $site['id']], ['module', $module['name']]])->get()
            );
        }
        return $permissions;
    }

    /**
     * 加载模块缓存
     * @param Site $site
     * @return bool
     * @throws \Throwable
     */
    public function loadModulePermissions(Site $site): bool
    {
        \DB::transaction(function () use ($site) {
            $names = [];
            foreach (Module::all() as $module) {
                $file = Storage::disk('module')->path($module['name'] . '/Config') . DIRECTORY_SEPARATOR . 'permissions.php';
                if (is_file($file)) {
                    foreach ($this->formatPermission($site, $module) as $permission) {
                        $names[] = $name = 's' . $site['id'] . '.' . $module['name'] . '.' . $permission['name'];
                        Permission::firstOrCreate(['name' => $name], [
                            'name' => $name,
                            'title' => $permission['title'],
                            'permission' => $module['name'] . '.' . $permission['name'],
                            'site_id' => $site['id'],
                            'module' => $module['name'],
                        ]);
                    }
                }
            }
            \DB::table('permissions')->where('site_id', $site['id'])->whereNotIn('name', $names)->delete();
        });
        return true;
    }

    /**
     * 添加模块系统权限
     * @param Site $site
     * @param Module $module
     * @return array
     */
    protected function formatPermission(Site $site, Module $module)
    {
        $file = Storage::disk('module')->path($module['name'] . '/Config') . DIRECTORY_SEPARATOR . 'permissions.php';
        if (is_file($file)) {
            $permissions = (array)include $file;
            $permissions[] = [
                'name' => 'domain',
                'title' => '域名管理',
                'site_id' => $site['id'],
                'module' => $module['name'],
            ];
            $permissions[] = [
                'name' => 'wx_replies',
                'title' => '微信回复列表',
                'site_id' => $site['id'],
                'module' => $module['name'],
            ];
            $permissions[] = [
                'name' => 'wx_entry',
                'title' => '微信封面入口',
                'site_id' => $site['id'],
                'module' => $module['name'],
            ];
            $permissions[] = [
                'name' => 'menu_web',
                'title' => '桌面会员中心菜单',
                'site_id' => $site['id'],
                'module' => $module['name'],
            ];
            $permissions[] = [
                'name' => 'menu_mobile',
                'title' => '手机会员中心菜单',
                'site_id' => $site['id'],
                'module' => $module['name'],
            ];
            return $permissions;
        }
    }
}