<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Module;
use App\Models\Site;
use App\Repositories\Traits\ModuleTrait;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

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
        \Artisan::call('cms:module-make', ['name' => $this->package['name']]);
        //写入配置项
        $this->fitThumb();
        $this->writeConfig();
        return parent::create([
            'title' => $this->package['title'],
            'name' => $this->package['name'],
            'subscribe' => $this->package['subscribe'] ?? false,
            'local' => true,
            'package' => $this->package,
            'permissions' => $this->permissions,
        ]);
    }

    public function update(Model $model, array $attributes)
    {
        $attributes = array_merge(array_except($this->package, ['name']), $attributes);
        $this->package = array_merge($model['package'], $attributes);
        $this->permissions = include $this->configPath() . 'permissions.php';
        $this->menus = include $this->configPath() . 'menus.php';
        $this->fitThumb();
        $this->writeConfig();
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
     * 写入模块图片
     * @return bool
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    protected function fitThumb(): bool
    {
        $response = (new Client())->get($this->package['thumb']);
        $thumb = \Storage::disk('module')->path($this->package['name']) . '/thumb.jpeg';
        if (file_put_contents($thumb, $response->getBody()->getContents())) {
            Image::load($thumb)->fit(Manipulations::FIT_CROP, 500, 300)->save();
            return true;
        }
        return false;
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
        $this->package = array_merge($this->package, include $this->configPath($model['name']) . 'package.php');
        $this->permissions = include $this->configPath($model['name']) . 'permissions.php';
        $this->menus = include $this->configPath($model['name']) . 'menus.php';
        return parent::update($model, [
            'title' => $this->package['title'],
            'name' => $this->package['name'],
            'menus' => $this->menus,
            'local' => true,
            'package' => $this->package,
        ]);
    }

    /**
     * 获取用户在站点的模块
     * @param Site $site
     * @param User $user
     * @return array|\Illuminate\Support\Collection
     * @throws \Exception
     */
    public function getSiteModulesByUser(Site $site, User $user)
    {
        $modules = collect();
        //站长获取所有模块
        foreach ($site->modules as $module) {
            $module = $this->filterModuleMenu($site, $module, $user);
            if ($module['menus']) {
                $modules->push($module);
            }
        }
        return $modules;
    }

    /**
     * 过滤掉没权限的模块菜单
     * @param Site $site
     * @param Module $module
     * @param User $user
     * @return Module|null
     */
    public function filterModuleMenu(Site $site, Module $module, User $user): ?Module
    {
        $module = $this->addSystemMenu($site, $module);
        $formats = [];
        foreach ($module['menus'] as $title => $menus) {
            $menus = array_filter($menus, function ($menu) use ($module, $site, $user) {
                return ($site->admin['id'] == $user['id']) || module_access($menu['permission'], $module['name']);
            });
            if ($menus) {
                $formats[$title] = $menus;
            }
        }
        $module['menus'] = $formats;
        return $module;
    }

    /**
     * 向模块添加系统菜单
     * @param Site $site
     * @param Module $module
     * @return Module
     */
    public function addSystemMenu(Site $site, Module $module)
    {
        $menus = [];
        if ($module['package']['config']) {
            $menus['系统功能'][] = [
                'title' => '参数设置',
                'url' => module_link('module.config.create', '', $site, $module),
                'permission' => 'config',
            ];
        }
        if ($module['package']['domain']) {
            $menus['系统功能'][] = [
                'title' => '域名管理',
                'url' => module_link('module.domain.create', '', $site, $module),
                'permission' => 'domain',
            ];
        }
        if ($module['package']['menu_web']) {
            $menus['系统功能'][] = [
                'title' => '桌面会员中心菜单',
                'url' => module_link('module.menu.index', 'web', $site, $module),
                'permission' => 'menu_web',
            ];
        }
        if ($module['package']['menu_mobile']) {
            $menus['系统功能'][] = [
                'title' => '手机会员中心菜单',
                'url' => module_link('module.menu.index', 'mobile', $site, $module),
                'permission' => 'menu_mobile',
            ];
        }
        if ($module['package']['wx_replies']) {
            $menus['微信回复'][] = [
                'title' => '文本消息回复',
                'url' => module_link('module.text.index', '', $site, $module),
                'permission' => 'wx_replies',
            ];
        }
        if ($module['package']['wx_cover']) {
            $menus['微信回复'][] = [
                'title' => '模块封面入口',
                'url' => module_link('module.cover.create', '', $site, $module),
                'permission' => 'wx_cover',
            ];
        }
        $module['menus'] = array_merge($menus,
            include \Storage::drive('module')->path($module['name']) . '/Config/menus.php');
        return $module;
    }

    /**
     * 获取当前用户有权限执行的
     * 模块第一个后台链接
     * @param Site $site
     * @param Module $module
     * @param User $user
     * @return string|null
     * @throws \Exception
     */
    public function getModuleFirstUrl(Site $site, Module $module, User $user): ?string
    {
        $module = $this->filterModuleMenu($site, $module, $user);
        foreach ($module['menus'] as $title => $menus) {
            foreach ($menus as $menu) {
                if (module_access($menu['permission'], $module['name'])) {
                    return $menu['url'];
                }
            }
        }
    }

    public function menus(string $type )
    {

    }
}