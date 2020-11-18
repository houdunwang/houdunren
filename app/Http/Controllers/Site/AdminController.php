<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use InvalidArgumentException;
use LogicException;

/**
 * 站点管理员
 * @package App\Http\Controllers\Site
 */
class AdminController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Site::class, 'site');
  }

  /**
   * 管理员列表
   * @param Site $site
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function index(Site $site)
  {
    $users = $site->admins;
    return view('site.admin.index', compact('site', 'users'));
  }

  /**
   * 保存管理员
   * @param Site $site
   * @param User $admin
   * @return RedirectResponse
   * @throws InvalidArgumentException
   * @throws BindingResolutionException
   */
  public function store(Site $site, User $admin)
  {
    $admin->sites()->syncWithoutDetaching([$site->id]);
    return back()->with('success', '站点管理员设置成功');
  }

  /**
   * 搜索管理员
   * @param Request $request
   * @param Site $site
   * @return mixed
   */
  public function search(Request $request, Site $site)
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

  /**
   * 移除管理员
   * @param Site $site
   * @param User $admin
   * @return JsonResponse
   * @throws InvalidArgumentException
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function destroy(Site $site, User $admin)
  {
    $admin->sites()->detach([$site->id]);
    $roles = $admin
      ->roles()
      ->where('site_id', $site['id'])
      ->pluck('id');
    $roles->map(function ($role) use ($admin) {
      $admin->removeRole($role);
    });

    return response()->json(['message' => '管理员移除成功']);
  }


  public function role(Site $site, User $user)
  {
    $this->authorize('update', $site);

    $roles = $site->roles;
    return view('site.admin.role', compact('site', 'user', 'roles'));
  }

  public function updateRole(Site $site, User $user, Request $request)
  {
    $this->authorize('update', $site);

    $user->syncRoles($request->input('roles'));
    return redirect()
      ->route('site.admin.index', [$site])
      ->with('success', '角色设置成功');
  }
}
