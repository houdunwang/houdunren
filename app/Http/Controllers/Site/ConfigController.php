<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

/**
 * 站点配置
 * @package App\Http\Controllers\Site
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 编辑视图
     *
     * @param Site $site
     * @return void
     */
    public function edit(Site $site)
    {
        config(['site' => $site->config]);
        $wechats = WeChat::where('site_id', $site['id'])->get();
        return inertia('Site/Config/Edit', compact('site', 'wechats'));
        // return view('site.config.edit', compact('site', 'wechats'));
    }

    /**
     * 保存配置项
     *
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function update(Request $request, Site $site)
    {
        $site->config = $request->except(['_token', '_method']);
        $site->save();
        return back()->with('success', '站点配置保存成功');
    }
}
