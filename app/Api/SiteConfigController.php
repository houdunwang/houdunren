<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

/**
 * 站点配置
 * @package App\Http\Controllers\Site
 */
class SiteConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'site']);
    }

    /**
     * 编辑视图
     *
     * @param Site $site
     * @return void
     */
    public function show(Site $site)
    {
        return $site->config;
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
        return ['message' => '站点配置保存成功'];
    }
}
