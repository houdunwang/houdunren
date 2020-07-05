<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('site_config.edit');
    }

    public function update(Request $request, Site $site)
    {
        $site->config = $request->except(['_token', '_method']);
        $site->save();
        return back()->with('success', '配置设置成功');
    }
}
