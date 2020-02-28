<?php

use App\Models\Site;
use App\Servers\AccessServer;
use App\Servers\SiteServer;
use App\Servers\UserServer;
use App\User;

/**
 * 超级管理员
 * @return bool
 */
function isSuperAdmin(): bool
{
  return app(UserServer::class)->isSuperAdmin();
}

/**
 * 缓存或获取站点模型
 * @param \App\Models\Site|null $site
 * @return \App\Models\Site|null
 */
function site($site = null): Site
{
  return app(SiteServer::class)->site($site);
}

/**
 * 检测模块访问权限
 * @param string $permission 权限标识
 * @return bool
 */
function access(string $permission, ?Site $site, ?User $user): bool
{
  return app(AccessServer::class)->check($permission, $site, $user);
}
