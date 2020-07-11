<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Site $site)
    {
        $users = $site->admins;
        return view('admin.index', compact('site', 'users'));
    }

    public function store(Site $site, User $admin)
    {
        $admin->sites()->syncWithoutDetaching([$site->id],);
        return back()->with('success', '站点管理员设置成功');
    }

    public function search(Request $request, Site $site)
    {
        $admins = $site->admins->pluck('id')->toArray();
        array_push($admins, $site->master->id);

        $users = User::search($request->input('name'))->whereNotIn('id', $admins)->limit(10)->get();

        return $users;
    }

    public function destroy(Site $site, User $admin)
    {
        $admin->sites()->detach([$site->id]);
        $roles = $admin->roles()->where('site_id', $site['id'])->pluck('id');
        $roles->map(function ($role) use ($admin) {
            $admin->removeRole($role);
        });

        return response()->json(['message' => '管理员移除成功']);
    }

    public function role(Site $site, User $user)
    {
        $roles = $site->roles;
        return view('admin.role', compact('site', 'user', 'roles'));
    }

    public function updateRole(Site $site, User $user, Request $request)
    {
        $user->syncRoles($request->input('roles'));
        return redirect()->route('site.admin.index', [$site])->with('success', '角色设置成功');
    }
}
