<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Menu;
use App\Models\Site;

/**
 * 菜单管理
 * Class MenuRepository
 * @package App\Repositories
 */
class MenuRepository extends Repository
{
    protected $model = Menu::class;

    /**
     * 获取前台菜单（会员中心、个人空间、前台）
     * @param Site $site 站点
     * @param string $type 菜单类型: member_pc桌面会员中心菜单,member_mobile移动端会员中心菜单
     * @return array
     */
    public function get(Site $site, string $type): array
    {
        $menus = [];
        foreach ($site->modules as $module) {
            $config = include \Storage::drive('module')->path($module['name']) . '/Config/menus.php';
            $menus[$module['title']]['menus'] = $config[$type] ?? [];
            $menus[$module['title']]['module'] = $module;
            if (empty($menus[$module['title']]['menus'])) {
                unset($menus[$module['title']]);
            }
        }
        return $menus;
    }

    /**
     * 获取第一个菜单
     * @param Site $site
     * @param string $type
     * @return mixed
     */
    public function first(Site $site, string $type)
    {
        $menus = $this->get($site, $type);
        return current($menus)['menus'][0];
    }
}