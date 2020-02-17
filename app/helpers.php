<?php
/**
 * 超级管理员
 * @return bool
 */
function isSuperAdmin()
{
  return auth()->check() && auth()->id() === 1;
}

/**
 * 缓存或获取站点模型
 * @param \App\Models\Site|null $site
 * @return \App\Models\Site|null
 */
function site(?\App\Models\Site $site)
{
  static $cache = null;
  if ($site) $cache = $site;
  return $cache;
}
