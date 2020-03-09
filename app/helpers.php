<?php

use App\Models\Site;
use App\Services\AccessServer;
use App\Services\ModuleServer;
use App\Services\SiteServer;
use App\Services\UserService;
use App\User;

/**
 * 超级管理员
 * @return bool
 */
function isSuperAdmin(): bool
{
  return app(UserService::class)->isSuperAdmin();
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
 * 根据访问网址获取模块
 * @return \App\Models\Module
 */
function module()
{
  return app(ModuleServer::class)->getByUrl();
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

/**
 * 表外键关联约束
 * @param \Illuminate\Database\Schema\Blueprint $table 迁移对象
 * @param string $tableName 关联表
 * @param string $foreignKey 关联字段
 * @return void
 */
function table_foreign(\Illuminate\Database\Schema\Blueprint $table, string $tableName, string $foreignKey): void
{
  $table->unsignedBigInteger($foreignKey)->nullable();
  $table->foreign($foreignKey)->references('id')->on($tableName)->onDelete('cascade');
}

/**
 * 站点表关联
 * @param \Illuminate\Database\Schema\Blueprint $table 迁移对象
 * @return void
 */
function table_foreign_site(\Illuminate\Database\Schema\Blueprint $table)
{
  $table->unsignedBigInteger('site_id');
  $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
}

/**
 * 用户表关联
 * @param \Illuminate\Database\Schema\Blueprint $table 迁移对象
 * @return void
 */
function table_foreign_user(\Illuminate\Database\Schema\Blueprint $table)
{
  $table->unsignedBigInteger('user_id');
  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
}
