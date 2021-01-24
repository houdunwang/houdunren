<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use MenuService;
use Inertia\Inertia;

/**
 * 模块配置管理
 * @package App\Http\Controllers\Module
 */
class EntryController extends Controller
{
    public function __invoke()
    {
        $menus = MenuService::currentUserMenus();
        return Inertia::location($menus[0]['items'][0]['route']);
    }
}
