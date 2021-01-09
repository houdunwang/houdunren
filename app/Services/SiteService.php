<?php

namespace App\Services;

use App\Models\Site;

/**
 * 站点服务
 */
class SiteService
{
    /**
     * 根据域名获取站点
     *
     * @return void
     */
    public function getByDomain()
    {
        $info = parse_url(request()->url());
        return Site::where('domain', 'regexp', 'https?:\/\/' . $info['host'])->firstOrFail();
    }
}
