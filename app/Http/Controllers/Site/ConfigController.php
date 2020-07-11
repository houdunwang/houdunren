<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    public function edit(Site $site)
    {
        config(['site' => $site->config]);
        return view('site_config.edit', compact('site'));
    }

    public function update(Request $request, Site $site)
    {
        $site->config = $request->except(['_token', '_method']);
        $site->save();
        return redirect()
            ->route('admin')
            ->with('success', '站点配置保存成功');
    }
}
