<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Site;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    public function index(Site $site)
    {
        $roles = Role::where('site_id', $site->id)->get();
        return view('role.index', compact('roles', 'site'));
    }

    public function create(Site $site)
    {
        return view('role.create', compact('site'));
    }

    public function store(RoleRequest $request, Site $site)
    {
        Role::create($request->only(['title', 'name']) + ['site_id' => $site->id]);
        return redirect()
            ->route('site.role.index', $site)
            ->with('success', '角色添加成功');
    }

    public function edit(Site $site, Role $role)
    {
        return view('role.edit', compact('role', 'site'));
    }

    public function update(Request $request, Site $site, Role $role)
    {
        $role->fill($request->input())->save();
        return redirect()
            ->route('site.role.index', $site)
            ->with('success', '角色保存成功');
    }

    public function destroy(Site $site, Role $role)
    {
        $role->delete();

        response()->json(['message' => '角色删除成功']);
    }
}
