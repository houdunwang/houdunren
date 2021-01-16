<?php

namespace App\Services\Site;

use App\Models\Site;

/**
 * 站点服务
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
     * 缓存或读取当前站点数据
     *
     * @param Site|null $site
     * @return Site|null
     */
    public function site(?Site $site = null): ?Site
    {
        static $cache = null;

        if ($cache) return $cache;

        if ($site) {
            session(['site_id' => $site['id']]);
        }
        if ($id = session('site_id')) {
            $cache = Site::find($id);
        };
        return $cache;
    }
}
