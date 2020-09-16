<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  /**
   * 搜索站点管理员
   */
  public function admin(Request $request, Site $site)
  {
    $admins = $site->admins->pluck('id')->toArray();
    array_push($admins, $site->master->id);

    $users = User::search($request->input('name'))
      ->with('wechatUser')
      ->whereNotIn('id', $admins)
      ->limit(10)
      ->get();

    return $users;
  }
}
