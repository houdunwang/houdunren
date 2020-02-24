<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\SiteResource;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Servers\SiteServer;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
  public function index(Site $site)
  {
    $users = $site->user;
    return $this->success('站点用户列表获取成功', UserResource::collection($users));
  }
  public function get(Site $site, User $user)
  {
    return $this->success('用户资料', new UserResource($user));
  }
  public function search(Request $request, Site $site, SiteServer $siteServer)
  {
    $users = $siteServer->getByKeyword($site, $request->input('content'));
    return $this->success('用户列表', UserResource::collection($users));
  }
}
