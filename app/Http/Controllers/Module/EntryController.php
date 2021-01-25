<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use MenuService;
use Inertia\Inertia;
use Auth;

/**
 * 模块配置管理
 * @package App\Http\Controllers\Module
 */
class EntryController extends Controller
{
    public function __invoke()
    {
        $menus = MenuService::lists(site(), module(), Auth::user());
        return Inertia::location($menus[0]['items'][0]['route']);
    }
}
