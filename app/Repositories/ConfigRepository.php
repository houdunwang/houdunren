<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Config;
use Cache;
use Illuminate\Http\Request;

/**
 * 网站配置
 * Class ConfigRepository
 * @package App\Repositories
 */
class ConfigRepository extends Repository implements RepositoryInterface
{
    protected $model = Config::class;

    /**
     * 保存配置
     * @param string $name
     * @param array $data
     * @param string $type
     * @return bool
     */
    public function save(string $name, array $data, $type = 'module'): bool
    {
        $key = $name;
        if (in_array($type, ['module', 'site'])) {
            $key = $name ? ('s' . site()['id'] . $name) : null;
        }
        Config::updateOrCreate(
            [$type => $key],
            [$type => $key, 'data' => array_merge($this->get($name) ?? [], $data)]
        )->save();
        return Cache::forget($type);
    }

    /**
     * 获取默认值
     * @param string $name 支持点语法
     * @param null $default
     * @param string $type
     * @return mixed|null
     */
    public function get(?string $name, $default = null, $type = 'module')
    {
        if (in_array($type, ['module', 'site'])) {
            $name = $name ? ('s' . site()['id'] . $name) : null;
        }
        $cache = Cache::rememberForever($type, function () use ($type, $name) {
            return Config::pluck('data', $type);
        });
        return $name ? (array_get($cache, $name) ?? $default) : $cache;
    }
}