<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use ConfigService;
use CodeService;
use Exception;
use Auth;

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

    /**
     * 测试短信
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function sms(Request $request, Site $site)
    {
        ConfigService::site($site);
        try {
            CodeService::mobile(Auth::user()->mobile);
            return ['message' => '验证码发送成功'];
        } catch (Exception $e) {
            return $this->error('短信发送失败，请检查手机号或联系站长!' . $e->getMessage(), 500);
        }
    }
}
