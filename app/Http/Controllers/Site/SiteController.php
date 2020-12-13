<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Http\Request;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Site::class, 'site');
    }

    public function index()
    {
        if (user()->isSuperAdmin) {
            $sites = Site::all();
        } else {
            $sites = user()->allSites;
        }
        return inertia()->render('Site/Site/Index');
        // return view('site.site.index', compact('sites'));
    }

    public function create(ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        $templates = user()->group->templates;
        return view('site.site.create', compact('modules', 'templates'));
    }

    public function store(SiteRequest $request, Site $site)
    {
        $site->user_id = auth()->id();
        $site->config = [];

        $site->fill($request->input())->save();

        return redirect()
            ->route('admin')
            ->with('success', '站点添加成功');
    }

    public function edit(Site $site, ModuleService $moduleService)
    {
        $modules = $moduleService->allInstalled();
        $templates = user()->group->templates;

        return view('site.site.edit', compact('modules', 'site', 'templates'));
    }

    public function update(SiteRequest $request, Site $site)
    {
        $site->user_id = auth()->id();
        $site->fill($request->input())->save();

        return redirect()
            ->route('admin')
            ->with('success', '站点修改成功');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json(['message' => '删除成功']);
    }
}
