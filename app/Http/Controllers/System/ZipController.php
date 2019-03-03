<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\System;

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
    public function edit($id)
    {
        $module = Module::find($id);
        $storage = \Storage::disk('base');
        $zipper = new \Chumper\Zipper\Zipper();
        $name = strtolower($module['name']);
        $config = include($storage->path("Modules/{$module['name']}/Config/package.php"));
        $config['version'] = time();
        file_put_contents(
            $storage->path("Modules/{$module['name']}/Config/package.php"),
            "<?php return ".var_export($config, true).';');
        is_file($module['name'] . '.zip') && @unlink($module['name'] . '.zip');
        //复制目录
        foreach ($storage->allFiles("Modules/{$module['name']}") as $file) {
            $isNodeModule = strstr($file, "Modules/{$module['name']}/node_modules");
            if ($isNodeModule === false) {
                $zipper->make(public_path($module['name'] . '.zip'))
                    ->folder(dirname($file))
                    ->add(base_path($file));
            }
        }
        if (is_file("js/{$name}.js")) {
            $zipper->make(public_path($module['name'] . '.zip'))
                ->folder("js")
                ->add("js/{$name}.js");
        }
        if (is_file("css/{$name}.css")) {
            $zipper->make(public_path($module['name'] . '.zip'))
                ->folder("css")
                ->add("css/{$name}.css");
        }
        foreach ($storage->allFiles("public/images") as $file) {
            if (strstr($file, "{$name}_") !== false) {
                $zipper->make(public_path($module['name'] . '.zip'))
                    ->folder('images')
                    ->add(base_path($file));
            }
        }
        return redirect(url("{$module['name']}.zip"));
    }
}
