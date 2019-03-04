<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\System;

use App\Exceptions\ResponseHttpException;
use App\Models\Module;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 生成模块压缩包
 * Class ZipController
 * @package App\Http\Controllers\System
 */
class ZipController extends Controller
{
    /**
     * 打包模块
     * @param string $module
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function module(string $module)
    {
        try {
            $lowerName = strtolower($module);
            $storage = \Storage::disk('base');
            //更新配置
            $config['version'] = time();
            $config = include($storage->path("Modules/{$module}/Config/package.php"));
            put_contents_file($storage->path("Modules/{$module}/Config/package.php"), $config);
            is_file($module . '.zip') && @unlink($module . '.zip');

            //打包
            $zipper = new \Chumper\Zipper\Zipper();
            foreach ($storage->allFiles("Modules/{$module}") as $file) {
                $isNodeModule = strstr($file, "Modules/{$module}/node_modules");
                if ($isNodeModule === false) {
                    $zipper->make(public_path($module . '.zip'))->folder(dirname($file))->add(base_path($file));
                }
            }
            if (is_file("js/{$lowerName}.js")) {
                $zipper->make(public_path($module . '.zip'))->folder("js")->add("js/{$lowerName}.js");
            }
            if (is_file("css/{$lowerName}.css")) {
                $zipper->make(public_path($module . '.zip'))->folder("css")->add("css/{$lowerName}.css");
            }
            foreach ($storage->allFiles("public/images") as $file) {
                if (strstr($file, "{$lowerName}_") !== false) {
                    $zipper->make(public_path($module . '.zip'))->folder('images')->add(base_path($file));
                }
            }
            return redirect(url("{$module}.zip"));
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }
}
