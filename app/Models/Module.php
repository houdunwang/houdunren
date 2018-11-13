<?php
namespace App\Models;

use App\Http\Controllers\Content\HomeController;
use Illuminate\Database\Eloquent\Model;

/**
 * 模型
 * Class Module
 * @package App\Models
 */
class Module extends Model
{
    protected $fillable = [
        'name',
        'system',
        'title',
        'config',
        'permission',
        'domain',
        'center_menu',
        'center_menu_setting',
        'space_menu',
        'space_menu_setting',
        'admin_menu',
    ];

    protected $casts = [
        'config' => 'array',
        'permission' => 'array',
        'center_menu' => 'array',
        'space_menu' => 'array',
        'admin_menu' => 'array',
    ];

    /**
     * 获取后台菜单
     * @return \Illuminate\Support\Collection
     */
    public function adminMenus()
    {
        return collect($this['admin_menu'])->map(function ($menu) {
            $menu['permission'] = array_map(function ($menu) {
                return $menu['permission'];
            }, $menu['menus']);
            return $menu;
        });
    }

    /**
     * 获取模块权限
     * @return array
     */
    public function getModulePermission()
    {
        $data = [];
        foreach ($this['permission'] as $permission) {
            $data[] = $this['name'] . '-' . $permission['name'];
        }
        return $data;
    }
}
