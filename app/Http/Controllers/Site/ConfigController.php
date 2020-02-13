<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

/**
 * 站点配置
 * Class ConfigController
 * @package App\Http\Controllers\Site
 */
class ConfigController extends ApiController
{
    public function show(Site $site)
    {
        return $this->success('', $site['config']??[]);
    }

    public function update(Request $request, Site $site)
    {
        $site->config = $request->config;
        $site->save();
        return $this->success('配置成功更新', $site);
    }
}
