<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Models\Site;
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
        $this->authorizeResource(Site::class, 'site');
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
        try {
            CodeService::mobile(Auth::user()->mobile);
            return $this->message('验证码发送成功');
        } catch (Exception $e) {
            return $this->error('短信发送失败，可能是手机号错误或发送频繁。' . var_export($e->getExceptions(), true), 500);
        }
    }

    /**
     * 邮件发送测试
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function email(Request $request, Site $site)
    {
        try {
            CodeService::email(Auth::user()->email);
            return $this->message('验证码发送成功');
        } catch (Exception $e) {
            return $this->error('邮件发送失败，可能是邮箱错误或发送频繁。' . $e->getMessage(), 500);
        }
    }

    /**
     * 删除站点
     * @param Site $site
     * @return void
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return $this->message('删除成功');
    }
}
