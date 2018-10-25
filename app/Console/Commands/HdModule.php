<?php

namespace App\Console\Commands;

use App\Models\Config;
use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HdModule extends Command
{
    //命令
    protected $signature = 'hd-module';

    //命令描述
    protected $description = '生成模块缓存';

    public function __construct()
    {
        parent::__construct();
    }

    //命令执行入口
    public function handle()
    {

        $this->modules(glob(base_path().'/app/Http/Controllers/*'), 1);

        //设置站长权限
        $this->WebMaseterSyncPermission();

        //删除权限缓存
        app()['cache']->forget('spatie.permission.cache');

        $this->info('模块数据创建成功');
    }

    /**
     * 生成模块数据
     * @param string $modules 模块列表
     * @param bool $system 系统模块
     */
    protected function modules($modules, $system)
    {
        foreach ($modules as $module) {
            if (is_dir($module . '/System')) {
                $this->make($module . '/System', $system);
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
        $module = basename(dirname($dir));
        $config = include $dir . '/config.php';
        $permissions = include $dir . '/permission.php';
        $admin_menu = is_file($dir . '/Menus/admin.php') ? include $dir . '/Menus/admin.php' : [];
        $center_menu = is_file($dir . '/Menus/center.php') ? include $dir . '/Menus/center.php' : [];
        $space_menu = is_file($dir . '/Menus/space.php') ? include $dir . '/Menus/space.php' : [];
        //生成模块数据
        Module::firstOrNew(['name' => $module])->fill(
            [
                'system' => $system,
                'title' => $config['app'],
                'permission' => $permissions,
                'admin_menu' => $admin_menu,
                'center_menu' => $center_menu,
                'space_menu' => $space_menu,
            ]
        )->save();

        //生成模块权限数据,首先删除权限缓存
        foreach ($permissions as $permission) {
            $name = $module . '-' . $permission['name'];
            Permission::firstOrNew(['name' => $name])->fill(
                ['title' => $permission['title'], 'module' => strtolower($module)]
            )->save();
        }

        //生成模块配置项
        Config::firstOrNew(['name' => "_{$module}"])->fill(['data' => $config, 'module' => $module])->save();
    }

    protected function WebMaseterSyncPermission()
    {
        $role = Role::find(1);
        $role->syncPermissions(Permission::pluck('name'));

        User::find(1)->assignRole('webmaster');
    }
}
