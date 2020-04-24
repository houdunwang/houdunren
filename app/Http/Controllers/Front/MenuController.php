<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Site;
use App\Services\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * 模块菜单
 * @package App\Http\Controllers\Module
 */
class MenuController extends ApiController
{
    /**
     * 获取模块会员中心菜单
     * @param MenuService $menuService
     * @param mixed $module
     * @return JsonResponse
     */
    public function member(MenuService $menuService, $module)
    {
        $menus = $menuService->member(site(), $module);
        return $this->json($menus);
    }

    /**
     * 获取模块个人中心菜单
     * @param MenuService $menuService
     * @param mixed $module
     * @return JsonResponse
     */
    public function center(MenuService $menuService, $module)
    {
        $menus = $menuService->center(site(), $module);
        return $this->json($menus);
    }
}
