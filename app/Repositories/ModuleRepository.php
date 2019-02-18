<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Module;
use App\Repositories\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * 模块管理
 * Class ModuleRepository
 * @package App\Repositories
 */
class ModuleRepository extends Repository
{
    use ModuleTrait;
    protected $model = Module::class;

    public function create(array $attributes)
    {
        $attributes['name'] = ucfirst($attributes['name']);
        $this->package = array_merge($this->package, $attributes);
        \Artisan::call('hdcms:module-make', ['name' => $this->package['name']]);
        $this->writeConfig();
        $this->formatMenus();
        return parent::create([
            'title' => $this->package['title'],
            'name' => $this->package['name'],
            'local' => true,
            'package' => $this->package,
            'permissions' => $this->permissions,
            'menus' => $this->menus,
        ]);
    }

    public function update(Model $model, array $attributes)
    {
        $this->package = array_merge($model['package'], $attributes);
        $this->permissions = include $this->configPath() . 'permissions.php';
        $this->menus = include $this->configPath() . 'menus.php';
        $this->writeConfig();
        $this->formatMenus();
        return parent::update($model, [
            'title' => $this->package['title'],
            'name' => $this->package['name'],
            'local' => true,
            'package' => $this->package,
            'permissions' => $this->permissions,
            'menus' => $this->menus,
        ]);
    }

    /**
     * 写入配置
     * @return \Illuminate\Support\Collection
     */
    protected function writeConfig()
    {
        return collect([
            'package.php' => $this->package,
            'permissions.php' => $this->permissions,
            'menus.php' => $this->menus,
        ])->each(function ($data, $file) {
            file_put_contents($this->configPath() . $file, '<?php return ' . var_export($data, true) . ';');
        });
    }

    /**
     * 删除
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model)
    {
        \Storage::disk('module')->deleteDirectory($model['name']);
        return parent::delete($model);
    }

    /**
     * 在本地修改模块配置文件后刷新使用
     * @param Model $model
     * @return bool
     */
    public function refresh(Model $model)
    {
        $this->package = include $this->configPath($model['name']) . 'package.php';
        $this->permissions = include $this->configPath($model['name']) . 'permissions.php';
        $this->menus = include $this->configPath($model['name']) . 'menus.php';
        $this->formatMenus();
        return parent::update($model, [
            'title' => $this->package['title'],
            'name' => $this->package['name'],
            'menus' => $this->menus,
            'local' => true,
            'package' => $this->package,
        ]);
    }

    /**
     * 添加系统管理菜单
     */
    protected function formatMenus()
    {
        $this->menus['系统功能'] = [
            ['title' => '域名管理', 'url' => route('domain.create'), 'permission' => 'domain'],
            ['title' => '桌面会员中心菜单', 'url' => 'menu_mobile', 'permission' => 'menu_mobile'],
            ['title' => '手机会员中心菜单', 'url' => 'menu_web', 'permission' => 'menu_web'],
        ];
        $this->menus['微信回复'] = [
            ['title' => '微信回复列表', 'url' => 'wx_replies', 'permission' => 'wx_replies'],
            ['title' => '微信封面入口', 'url' => 'wx_entry', 'permission' => 'wx_entry'],
        ];
    }
}