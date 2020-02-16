<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends ApiController
{
  public function __construct(Request $request)
  {
    $this->authorizeResource(Site::class, 'site');
  }

  /**
   * 获取站点列表
   * @return JsonResponse
   */
  public function index(): JsonResponse
  {
    $user = auth()->user();
    $sites = $user['is_super_admin'] ? Site::get() : $user->site;
    return $this->success('站点列表获取成功', SiteResource::collection($sites));
  }

  public function store(SiteRequest $request, Site $site): JsonResponse
  {
    $site->fill($request->all());
    $site->user_id = auth()->id();

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
}
