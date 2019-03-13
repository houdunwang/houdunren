<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Update;

use App\Exceptions\ResponseHttpException;
use App\Models\Cloud;
use App\Models\Module;
use App\Repositories\ModuleRepository;
use App\Servers\HttpServer;
use App\Http\Controllers\Controller;
use Chumper\Zipper\Zipper;
use Storage;

/**
 * 模块更新管理
 * Class ModuleController
 * @package App\Http\Controllers\Update
 */
class ModuleController extends Controller
{
    /**
     * 已购模块列表
     * @param HttpServer $httpServer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws ResponseHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(HttpServer $httpServer, ModuleRepository $moduleRepository)
    {
        try {
            $response = $httpServer->authRequest('GET', 'api/shop/module');
            $modules = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            //模块检测
            $modules['data'] = array_map(function ($module) use ($moduleRepository) {
                $module['has_update'] = $module['local'] = false;
                $module['installed'] = $moduleRepository->has($module['name']);
                if ($module['installed']) {
                    $config = $moduleRepository->loadConfig($module['name']);
                    $module['has_update'] = $module['version'] > $config['version'];
                    $module['local'] = $config['local'];
                }
                return $module;
            }, $modules['data']);
            //排序
            $modules['data'] = array_sort($modules['data'], function ($module) {
                return $module['has_update'];
            });
            $cloud = Cloud::first();
            return view('update.module.index', compact('modules', 'cloud'));
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }

    /**
     * 安装模块
     * @param string $name
     * @param HttpServer $httpServer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws ResponseHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(string $name, HttpServer $httpServer, ModuleRepository $moduleRepository)
    {
        if ($moduleRepository->has($name)) {
            throw new ResponseHttpException('模块已经安装');
        }
        $client = $httpServer->authRequest('GET', "api/shop/module/{$name}");
        $content = \GuzzleHttp\json_decode($client->getBody()->getContents(), true);
        return view('update.module.show', ['module' => $content['data']]);
    }

    /**
     * 更新模块
     * @param string $name
     * @param HttpServer $httpServer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(string $name, HttpServer $httpServer)
    {
        $client = $httpServer->authRequest('GET', "api/shop/module/{$name}");
        $content = \GuzzleHttp\json_decode($client->getBody()->getContents(), true);
        return view('update.module.update', ['module' => $content['data']]);
    }

    /**
     * 下载模块
     * @param string $name
     * @param HttpServer $httpServer
     * @param ModuleRepository $moduleRepository
     * @return array
     * @throws ResponseHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download(string $name, HttpServer $httpServer, ModuleRepository $moduleRepository)
    {
        try {
            $response = $httpServer->authRequest('GET', "api/shop/module/{$name}/download");
            if ($response->getStatusCode() == 200) {
                Storage::deleteDirectory("temp/{$name}");
                Storage::makeDirectory("temp/{$name}");
                $content = $response->getBody()->getContents();
                if (file_put_contents(Storage::path("temp/{$name}/{$name}.zip"), $content) === false) {
                    throw new \Exception('模块文件下载失败');
                }
            }
            $this->move($name);
            $this->install($name, $moduleRepository);
            return ['code' => 0, 'message' => '模块下载成功'];
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }

    /**
     * 下载模块后执行安装或更新
     * @param string $name
     * @param ModuleRepository $moduleRepository
     * @throws ResponseHttpException
     */
    protected function install(string $name, ModuleRepository $moduleRepository)
    {
        $module = Module::where('name', $name)->first();
        if ($module) {
            $moduleRepository->update($module, []);
        } else {
            $moduleRepository->install($name);
        }
    }

    /**
     * 移动下载文件到模块目录
     * @param string $name
     * @throws \Exception
     */
    protected function move(string $name)
    {
        $zipper = new Zipper();
        $zipper->make(\Storage::path("temp/{$name}/{$name}.zip"))
            ->extractTo(\Storage::path("temp/{$name}"));
        $this->config($name, ['local' => false]);
        Storage::drive('module')->deleteDirectory($name);
        Storage::drive('base')->deleteDirectory("public/modules/" . strtolower($name));
        foreach (['modules', 'public'] as $dir) {
            foreach (\Storage::allFiles("temp/{$name}/{$dir}") as $file) {
                $to = strstr($file, $dir);
                $from = "storage/app/temp/{$name}/{$to}";
                Storage::drive('base')->move($from, $to);
            }
        }
        Storage::delete("temp/{$name}.zip");
        Storage::deleteDirectory("temp/{$name}");
    }

    /**
     * 修改配置
     * @param $name
     * @param array $config
     * @throws ResponseHttpException
     */
    protected function config($name, array $config)
    {
        try {
            $file = Storage::path("temp/{$name}/modules/{$name}/Config/package.php");
            put_contents_file($file, array_merge(include $file, $config));
        } catch (\Exception $exception) {
            throw new ResponseHttpException('修改配置文件失败');
        }
    }
}
