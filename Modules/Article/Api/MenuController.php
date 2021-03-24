<?php

namespace Modules\Article\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Modules\Article\Entities\Menu;
use Illuminate\Http\Request;
use Modules\Article\Http\Requests\MenuRequest;
use Modules\Article\Transformers\MenuResource;
use Auth;
use DB;

/**
 * 菜单内容
 * @package Modules\Article\Api
 */
class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'module'])->except(['index', 'show']);
    }

    public function index()
    {
        $menus = Menu::where('site_id', site('id'))->orderBy('rank', 'asc')->get();
        return MenuResource::collection($menus);
    }

    public function update(Request $request, Site $site)
    {
        $menus = $request->menus;
        foreach ($menus as $index => $menu) {
            if ($menu['title'] && $menu['url']) {
                Menu::updateOrCreate(['id' => $menu['id'] ?? 0], ['site_id' => site('id'), 'user_id' => Auth::id(), 'rank' => $index] + $menu);
            }
        }
        return $this->message('菜单更新成功');
    }

    public function destroy(Site $site, Menu $menu)
    {
        $menu->delete();
        return $this->message('菜单删除成功');
    }
}
