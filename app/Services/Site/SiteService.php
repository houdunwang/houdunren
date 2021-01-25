<?php

namespace App\Services\Site;

use App\Models\Site;

/**
 * 站点服务
 *
 * @package App\Services\Site
 */
class SiteService
{
    /**
     * 根据域名获取站点
     *
     * @return Site|null
     */
    public function getByDomain(): ?Site
    {
        $info = parse_url(request()->url());
        return Site::where('domain', 'regexp', 'https?:\/\/' . $info['host'])->firstOrFail();
    }

    /**
     * 缓存或读取当前站点
     *
     * @param Site|null $site
     * @return Site|null
     */
    public function cache(?Site $site = null): ?Site
    {
        static $cache = null;
        if (is_null($site)) return $cache;
        return $cache = $site;
    }
}
