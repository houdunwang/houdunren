<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Site;

/**
 * 站点管理
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    public function index()
    {
        $sites = auth()->user()->site;
        return view('site.index', compact('sites'));
    }

    public function create()
    {
        return view('site.create');
    }

    public function store(SiteRequest $request)
    {
        auth()->user()->site()->create($request->input());
        return redirect(route('site.index'))->with('success', '站点创建成功');
    }

    public function show(Site $site)
    {
        return view('site.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return view('site.edit', compact('site'));
    }

    public function update(SiteRequest $request, Site $site)
    {
        $site->update($request->input());
        return redirect(route('site.index'))->with('success', '站点修改成功');
    }

    public function destroy(Site $site)
    {
        $this->authorize('delete', $site);
        $site->delete();
        return back()->with('success', '站点删除成功');
    }
}
