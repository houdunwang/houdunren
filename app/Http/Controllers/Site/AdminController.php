<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Servers\SiteServer;
use App\User;
use Illuminate\Http\Request;

/**
 * 站点管理员
 * Class AdminController
 * @package App\Http\Controllers\Site
 */
class AdminController extends ApiController
{
  public function __construct()
  {
    $this->middleware('siteAuth');
  }
  public function index(Site $site)
  {
    $users = $site->operator;
    return $this->success('操作员表获取成功', UserResource::collection($users));
  }

  public function add(Request $request, Site $site)
  {
    array_map(function ($uid) use ($site) {
      $site->user()->updateExistingPivot($uid, ['role' => 'operator']);
    }, $request->input('users'));

    return $this->success('设置成功');
  }
  public function remove(Request $request, Site $site)
  {
    array_map(function ($uid) use ($site) {
      $isAdmin =  app(SiteServer::class)->isAdmin($site, User::find($uid));
      if (!$isAdmin)
        $site->user()->updateExistingPivot($uid, ['role' => 'user']);
    }, $request->input('users'));
    return $this->success('设置成功');
  }
}
