<?php

use App\Models\Module;
use App\Models\Site;
use App\Services\AccessService;
use App\Services\ModuleService;
use App\Services\SiteService;
use App\Services\UserService;
use App\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * 超级管理员
 * @return bool
 */
function isSuperAdmin(): bool
{
    return app(UserService::class)->isSuperAdmin(Auth::user());
}

/**
 * 根据路由生成类样式名
 * @return string|null
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 缓存或获取站点模型
 * @param mixed|null $site
 * @return mixed
 * @throws BindingResolutionException
 */
function site($site = null)
{
    return app(SiteService::class)->site($site);
}
/**
 * 缓存模块
 * 主要用于后台模块管理
 * @return \App\Models\Module
 */
function module(Module $module = null)
{
    return app(ModuleService::class)->module($module);
}
/**
 * 检测模块访问权限
 * @param string $permission 权限标识
 * @return bool
 */
function access(string $permission, ?Site $site, ?User $user): bool
{
    return app(AccessService::class)->check($permission, $site, $user);
}

/**
 * 表外键关联约束
 * @param \Illuminate\Database\Schema\Blueprint $table 迁移对象
 * @param string $tableName 关联表
 * @param string $foreignKey 关联字段
 * @param string $comment 说明
 * @return void
 */
function table_foreign(\Illuminate\Database\Schema\Blueprint $table, string $tableName, string $foreignKey, string $comment = ''): void
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
    $table->unsignedBigInteger('site_id')->comment('站点编号');
    $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
}

/**
 * 用户表关联
 * @param \Illuminate\Database\Schema\Blueprint $table 迁移对象
 * @return void
 */
function table_foreign_user(\Illuminate\Database\Schema\Blueprint $table)
{
    $table->unsignedBigInteger('user_id')->comment('用户编号');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
}
