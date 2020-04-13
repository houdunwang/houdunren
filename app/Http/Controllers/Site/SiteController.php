<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Module;
use App\Models\Site;
use App\Services\SiteService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 站点管理
 * Class SiteController
 * @package App\Http\Controllers\Site
 */
class SiteController extends ApiController
{
    public function __construct(Request $request)
    {
        $this->middleware('site:admin')->except(['index', 'store']);
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 获取站点列表
     * @return JsonResponse
     */
    public function index(SiteService $siteService)
    {
        $sites = $siteService->getUserAllSite(Auth::user());
        return $this->json(SiteResource::collection($sites));
    }

    public function store(SiteRequest $request, Site $site): JsonResponse
    {
        $site->fill($request->all());
        $site->save();
        $site->user()->attach(auth()->id(), ['role' => 'admin']);
        return $this->success('站点添加成功');
    }

    /**
     * 获取站点
     * @param Site $site
     * @return SiteResource
     */
    public function show(Site $site)
    {
        return $this->json(new SiteResource($site));
    }

    /**
     * 更新站点
     * @param SiteRequest $request
     * @param Site $site
     * @return JsonResponse
     * @throws JsonEncodingException
     * @throws MassAssignmentException
     */
    public function update(SiteRequest $request, Site $site): JsonResponse
    {
        $site->fill($request->all())->save();
        return $this->success('站点修改成功');
    }

    public function destroy(Site $site): JsonResponse
    {
        $site->delete();
        return $this->success('栏目删除成功');
    }
}
