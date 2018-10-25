<?php

namespace App\Console\Commands;

use App\Models\Config;
use App\Models\ContentTemplate;
use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitCommand extends Command
{
    //命令
    protected $signature = 'hdcms-init';

    //命令描述
    protected $description = '生成模块缓存';

    public function __construct()
    {
        parent::__construct();
    }

    //命令执行入口
    public function handle()
    {
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
        $admin_menu = is_file($dir . '/Menus/admin.php') ? include $dir . '/Menus/admin.php' : null;
        $center_menu = is_file($dir . '/Menus/center.php') ? include $dir . '/Menus/center.php' : null;
        $space_menu = is_file($dir . '/Menus/space.php') ? include $dir . '/Menus/space.php' : null;
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
    }

    protected function WebMaseterSyncPermission()
    {
        $role = Role::find(1);
        $role->syncPermissions(Permission::pluck('name'));

        User::find(1)->assignRole('webmaster');
    }
}
