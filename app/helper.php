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
 * @param Illuminate\Database\Schema\Blueprint $table Blueprint 对象数据迁移
 * @param string $tableName 关联表
 * @param string $foreignKey 关联字段
 */
function table_foreign(\Illuminate\Database\Schema\Blueprint $table, string $tableName, string $foreignKey): void
{
    $table->unsignedInteger($foreignKey);
    $table->foreign($foreignKey)->references('id')->on($tableName)->onDelete('cascade');
}

/**
 * 保存或获取当前站点
 * @param \App\Models\Site|null $site 站点模型
 * @return \App\Models\Site
 */
function site(\App\Models\Site $site = null): ?\App\Models\Site
{
    static $cache = null;
    if (is_null($site)) {
        return $cache;
    }
    return $cache = $site;
}

/**
 * 保存或获取当前模块
 * @param \App\Models\Module $module 模型对象
 * @return \App\Models\Module|null
 */
function module(\App\Models\Module $module = null): ?\App\Models\Module
{
    static $cache = null;
    if (is_null($module)) {
        return $cache;
    }
    return $cache = $module;
}

/**
 * 模块权限判断
 * @param string|array $permission 权限标识
 * @param string|null $module 模块标识（一般不用设置系统会自动获取当前模块）
 * @param bool $abort 验证失败时显示错误页面
 * @return mixed
 * @throws Exception
 */
function module_access($permission, string $module = null, $abort = false): bool
{
    $permissions = is_array($permission) ? $permission : [$permission];
    $status = false;
    if (auth()->check()) {
        if (site()['admin']['id'] == auth()->id()) {
            return true;
        } else {
            $module = $module ?? module()['name'];
            foreach ($permissions as $permission) {
                $permission = 's' . site()['id'] . '.' . $module . '.' . $permission;
                $status = auth()->user()->can($permission);
                if (!$status) {
                    return $abort ? abort(403, '您没有操作权限') : false;
                }
            }
            return true;
        }
    }
    return $status;
}

/**
 * 获取当前访问域名
 * @return string
 */
function host()
{
    return (request()->secure() ? 'https://' : 'http://') . request()->getHost();
}

/**
 * 模块链接
 * @param string $route 路由
 * @param string $params 路由参数
 * @param \App\Models\Site|null|array $site
 * @param \App\Models\Module|null|array $module
 * @return string
 */
function module_link(
    string $route,
    $params = '',
    $site = null,
    $module = null
): string {
    $params = is_array($params) ? $params : [$params];
    $site = $site ?? site();
    $module = $module ?? \module();
    return route($route, array_merge($params, ['sid' => $site['id'], 'mid' => $module['id']]));
}

/**
 * 生成随机数字
 * @param int $len
 * @return string
 */
function number_random($len = 5)
{
    $seeds = '0123456789';
    $number = '';
    for ($i = 0; $i < $len; $i++) {
        $number .= $seeds[mt_rand(0, 9)];
    }
    return $number;
}

/**
 * 写入文件内容
 * @param string $file 文件名
 * @param array $data 内容数据
 * @return bool
 * @throws \App\Exceptions\ResponseHttpException
 */
function put_contents_file(string $file, array $data): bool
{
    $content = '<?php return ' . var_export($data, true) . ';';
    if (file_put_contents($file, $content) === false) {
        throw new \App\Exceptions\ResponseHttpException('文件写入失败');
    }
    return true;
}