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
  public function __construct()
  {
    $this->middleware('siteAuth')->except('index');
  }

  public function show(Site $site)
  {
    $config = array_merge(config('hd.site'), $site['config'] ?? []);
    return $this->success('', $config);
  }

  public function update(Request $request, Site $site)
  {
    $site['config'] = $request['data'];
    $site->save();
    return $this->success('配置成功更新', $site);
  }
}
