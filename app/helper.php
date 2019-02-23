<?php
/**
 * 根据路由设置样式类
 * @return string|null
 */
function route_class()
{
    return str_replace('.', '-', \Route::currentRouteName());
}

/**
 * 获取模块配置项
 * @param string $path 支持点语法的配置项
 * @param null $default 转变值
 * @param string $type 类型 module:模块,system:系统,site:站点
 * @return mixed
 */
function config_get(string $path, $default = null, $type = 'module')
{
    switch ($type) {
        //站点配置
        case 'site':
            $path = $path ? ('s' . site()['id'] . $path) : null;
            return app(\App\Repositories\ConfigRepository::class)->get($path, $default, $type);
            break;
        case 'module':
        case 'system':
        default:
            return app(\App\Repositories\ConfigRepository::class)->get($path, $default, $type);
    }
}

/**
 * 超级管理员检测
 * @return bool
 */
function isSuperAdmin(): bool
{
    return auth()->check() && auth()->user()['id'] == 1;
}

/**
 * 表外键关联约束
 * @param string $tableName 关联表
 * @param int $foreignKey 关联字段
 */
function tableForeign(string $tableName, int $foreignKey)
{
    $table->unsignedInteger($foreignKey);
    $table->foreign($foreignKey)->references('id')->on($tableName)->onDelete('cascade');
}

/**
 * 获取缓存站点的编号
 */
function site()
{
    return (new \App\Repositories\SiteRepository())->getAdminCacheSite();
}

/**
 * 获取缓存的模块
 * @return \Illuminate\Contracts\Cache\Repository
 * @throws Exception
 */
function module()
{
    return cache()->get('cache_admin_s' . site()['id'] . '_module');
}

/**
 * 模块权限判断
 * @param string $permission 权限标识
 * @param string|null $module 模块标识
 * @param bool $abort 验证失败时显示错误页面
 * @return mixed
 * @throws Exception
 */
function module_access(string $permission, string $module = null, $abort = false)
{
    if (site()['admin']['id'] == auth()->id()) {
        $status = true;
    } else {
        $module = $module ?? module()['name'];
        $permission = 's' . site()['id'] . '.' . $module . '.' . $permission;
        $status = auth()->user()->can($permission);
    }
    if (!$status && $abort) {
        abort(403, '您没有操作权限');
    }
    return $status;
}

/**
 * 域名
 * @return string
 */
function host()
{
    return (request()->secure() ? 'https://' : 'http://') . request()->getHost();
}