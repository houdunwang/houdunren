<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;
use ConfigService;
use CodeService;
use Exception;
use Auth;

/**
 * 站点管理
 * @package App\Http\Controllers\Site
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['current']);
        $this->middleware(['front'])->only(['current']);
        $this->authorizeResource(Site::class, 'site');
    }

    public function current()
    {
        return site();
    }
    /**
     * 站点列表
     * @return void
     */
    public function index()
    {
        $sites = Auth::user()->sites->load('master.group');
        return SiteResource::collection($sites);
    }

    /**
     * 获取单个站点
     * @param Site $site
     * @return void
     */
    public function show(Site $site)
    {
        return new SiteResource($site);
    }

    /**
     * 保存站点
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function store(SiteRequest $request, Site $site)
    {
        $site->fill($request->input());
        $site->user_id = auth()->id();
        $site->config = [];
        $site->module_id = request('module_id');
        $site->save();
        return $this->message('添加成功');
    }

    /**
     * 更新站点
     * @param SiteRequest $request
     * @param Site $site
     * @return void
     */
    public function update(SiteRequest $request, Site $site)
    {
        $this->authorize('update', $site);
        $site->fill($request->input());
        $site->module_id = request('module_id');
        $site->save();
        return $this->message('站点修改成功');
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
            return $this->error('短信发送失败，请检查手机号或联系站长!', 500);
        }
    }

    /**
     * 删除站点
     * @param Site $site
     * @return void
     */
    public function destroy(Site $site)
    {
        $this->authorize('delete', $site);
        $site->delete();
        return $this->message('删除成功');
    }
}
