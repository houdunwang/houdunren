<?php

namespace App\Console\Commands;

use App\Models\Config;
use App\Models\ContentTemplate;
use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModuleInitCommand extends Command
{
    //命令
    protected $signature = 'hdcms-module-init';

    //命令描述
    protected $description = '生成模块初始数据';

    //模块
    protected $module;

    public function __construct()
    {
        parent::__construct();
    }

    //命令执行入口
    public function handle()
    {
        //初始模块、权限
        $this->modules(glob(base_path() . '/app/Http/Controllers/*'), 1);

        //设置站长权限
        $this->WebMaseterSyncPermission();

        //权限缓存
        app()['cache']->forget('spatie.permission.cache');

        //模板缓存
        app(ContentTemplate::class)->updateCache();

        $this->info('恭喜你，系统初始化成功');
    }

    /**
     * 生成模块数据
     * @param array $modules 模块列表
     * @param bool $system 系统模块
     */
    protected function modules(array $modules, $system)
    {
        foreach ($modules as $module) {
            $this->module = basename($module);
            if (is_dir($module . '/config')) {
                $this->make($module . '/config', $system);
                $this->info($this->module . ' created');
            }
        }
    }

    /**
     * 生成模块数据
     * @param string $dir 模块目录
     * @param bool $system 系统模块
     */
    protected function make(String $dir, $system)
    {
        $config = is_file($dir . '/config.php') ? include $dir . '/config.php' : [];
        $permissions = is_file($dir . '/permission.php') ? include $dir . '/permission.php' : [];
        $admin_menu = is_file($dir . '/menus/admin.php') ? include $dir . '/menus/admin.php' : [];
        $center_menu = is_file($dir . '/menus/center.php') ? include $dir . '/menus/center.php' : [];
        $space_menu = is_file($dir . '/menus/space.php') ? include $dir . '/menus/space.php' : [];
        //生成模块数据
        Module::firstOrNew(['name' => $this->module])->fill(
            [
                'system' => $system,
                'config' => $config,
                'title' => $config['app'],
                'permission' => $permissions,
                'admin_menu' => $admin_menu,
                'center_menu' => $center_menu,
                'space_menu' => $space_menu,
            ]
        )->save();

        //生成模块权限数据,首先删除权限缓存
        foreach ($permissions as $permission) {
            $name = $this->module . '-' . $permission['name'];
            Permission::firstOrNew(['name' => $name])->fill(
                ['title' => $permission['title'], 'module' => strtolower($this->module)]
            )->save();
        }
    }

    /**
     * 设置站长权限
     */
    protected function WebMaseterSyncPermission()
    {
        $role = Role::find(1);
        $role->syncPermissions(Permission::pluck('name'));
        User::find(1)->assignRole('webmaster');
    }
}
