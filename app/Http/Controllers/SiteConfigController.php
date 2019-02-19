<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

/**
 * 站点配置
 * Class SiteConfigController
 * @package App\Http\Controllers
 */
class SiteConfigController extends Controller
{
    public function edit(Site $site, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $name = request()->query('name');
        $config = $repository->get('s'.$site['id'] . $name, [], 'site');

        return view('site_config.edit', compact('config', 'name', 'site'));
    }

    public function update(Request $request, Site $site, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $name = request()->query('name');
        $repository->save($request, 's'.$site['id'] . $name, 'site');
        return back()->with('success', '配置项保存成功');
    }
}
