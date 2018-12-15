<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Exceptions\InvalidParamException;
use App\Models\Config;
use Illuminate\Http\Request;

/**
 * 网站配置
 * Class ConfigRepository
 * @package App\Repositories
 */
class ConfigRepository extends Repository implements RepositoryInterface
{
    protected $name = Config::class;

    /**
     * 添加模块配置项
     * @param array $data
     * @param ModuleRepository $moduleRepository
     * @return bool
     * @throws InvalidParamException
     */
    public function save(array $data, ModuleRepository $moduleRepository): bool
    {
        $module = strtolower($moduleRepository->getNameFromUrl());
        \Cache::forget('config');
        return Config::updateOrCreate(
            ['module' => $module],
            ['module' => $module, 'data' => array_merge($this->get($module)??[],$data)]
        )->save();
    }

    /**
     * 获取默认值
     * @param string $name 支持点语法
     * @param null $default
     * @return mixed|null
     */
    public function get(string $name, $default = null)
    {
        $cache = \Cache::rememberForever('config', function () {
            return Config::pluck('data', 'module');
        });
        return array_get($cache, $name) ?? $default;
    }
}