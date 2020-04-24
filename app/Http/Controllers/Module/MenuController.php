<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\ApiController;
use App\Services\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;

/**
 * 模块菜单
 * @package App\Http\Controllers\Module
 */
class MenuController extends ApiController
{
    /**
     * 获取模块后台菜单
     * @param MenuService $menuService
     * @param mixed $name 模块名
     * @return JsonResponse
     */
    public function admin(MenuService $menuService, Site $site, $name)
    {
        $menus = $menuService->module(site(), $name, Auth::user());
        return $this->json($menus);
    }
}
