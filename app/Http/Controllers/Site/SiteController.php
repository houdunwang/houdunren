<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Module;
use App\Models\Site;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
  public function index(UserService $UserService)
  {
    $user = auth()->user();
    $sites = isSuperAdmin() ? Site::get() : $user->site()->wherePivotIn('role', ['admin', 'operator'])->get();
    return $this->json(SiteResource::collection($sites));
  }

  public function store(SiteRequest $request, Site $site): JsonResponse
  {
    $site->fill($request->all());
    $site->save();
    $site->user()->attach(auth()->id(), ['role' => 'admin']);
    return $this->success('站点添加成功');
  }

  public function show(Site $site): JsonResponse
  {
    return $this->success('站点获取成功', new SiteResource($site));
  }

  public function update(SiteRequest $request, Site $site): JsonResponse
  {
    $site->fill($request->all())->save();

    return $this->success('站点修改成功', $site);
  }

  public function destroy(Site $site): JsonResponse
  {
    $site->delete();
    return $this->success('栏目删除成功');
  }

  /**
   * 设置默认模块
   * @param Site $site
   * @param int $mid
   * @return JsonResponse
   */
  public function module(Site $site, int $mid)
  {
    $site['module_id'] = $mid;
    $site->save();
    return $this->success('默认模块设置成功');
  }
}
