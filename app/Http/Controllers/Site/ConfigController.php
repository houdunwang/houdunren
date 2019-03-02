<?php

namespace App\Http\Controllers\Site;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

/**
 * 站点配置
 * Class SiteConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Controller
{
    public function edit(Site $site, string $name, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $config = $repository->get('s' . $site['id'] . $name, [], 'site');
        return view('site.config.edit', compact('config', 'name', 'site'));
    }

    public function update(Site $site, string $name, Request $request, ConfigRepository $repository)
    {
        $this->authorize('update', $site);
        $repository->save($request, 's' . $site['id'] . $name, 'site');
        return back()->with('success', '配置项保存成功');
    }
}
