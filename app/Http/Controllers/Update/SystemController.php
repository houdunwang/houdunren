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
use App\Servers\HttpServer;
use App\Http\Controllers\Controller;

/**
 * 系统更新
 * Class UpdateController
 * @package App\Http\Controllers\System
 */
class SystemController extends Controller
{
    /**
     * 检测更新
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check(HttpServer $httpServer)
    {
        try {
            $cloud = Cloud::find(1) ?? null;
            $response = $httpServer->request('GET', "api/shop/cms/{$cloud['build']}");
            $update = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            //检测目录权限
            foreach ($update['files'] as $file => $stat) {
                $dir = '../' . dirname($file);
                is_dir($dir) or mkdir($dir, 0755, true);
                if (!is_writable($dir)) {
                    return back()->with('info', dirname($file) . '目录\r\n没有写入权限,不能执行更新操作');
                }
            }
            $this->cache($update);

            return view('update.system.check', compact('update', 'cloud'));
        } catch (\Exception $e) {
            return back()->with('info', '连接远程服务器失败 ! 可以尝试重新绑定云帐号');
        }
    }

    /**
     * 下载界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function downloadShow()
    {
        $update = \Cache::get('updateLists');
        if (!$update['total']) {
            return redirect(route('update.system.check'));
        }
        return view('update.system.download', compact('update'));
    }

    /**
     * 缓存列表移除已经更新文件
     * @return null
     * @param $update
     */
    protected function cache($update)
    {
        $update['download_files'] = array_filter($update['files'], function ($stat) {
            return $stat == 'downloaded';
        });
        $update['total'] = count($update['files']);
        $update['download_total'] = $update['total'] - count($update['download_files']);
        \Cache::forever('updateLists', $update);
    }

    /**
     * 执行下载
     * @return array|\Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download()
    {
        if (!($cache = \Cache::get('updateLists'))) {
            return redirect()->route('update.system.check');
        }
        foreach ($cache['files'] as $file => $stat) {
            if ($stat != 'downloaded') {
                try {
                    $this->downFile($file);
                    return response(['code' => 1, 'file' => $file]);
                } catch (\Exception $e) {
                    abort('500', $e->getMessage());
                }
            }
        }
        return response(['code' => 2, 'message' => '文件下载完成']);
    }

    /**
     * 下载文件
     * @param string $file
     * @throws \GuzzleHttp\Exception\GuzzleException | \Exception
     */
    protected function downFile(string $file)
    {
        $httpServer = new HttpServer();
        $response = $httpServer->request('POST', "api/shop/cms/file", ['form_params' => ['file' => $file]]);
        if ($response->getStatusCode() == 200) {
            $content = $response->getBody()->getContents();
            \Storage::drive('base')->makeDirectory('backup/cms/' . dirname($file));
            if (file_put_contents('../backup/cms/' . $file, $content) === false) {
                throw new \Exception('文件保存失败: backup/cms 目录不可写');
            }
            $cache = \Cache::get('updateLists');
            $cache['files'][$file] = 'downloaded';
            $this->cache($cache);
        }
    }

    /**
     * 备份旧版本与更新新文件
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function move()
    {
        $update = \Cache::get('updateLists');
        return view('update.system.move', compact('update'));
    }

    /**
     * 备份旧版本与更新新文件
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws ResponseHttpException
     */
    public function moveFile()
    {
        $cache = \Cache::get('updateLists');
        \Artisan::call('migrate');
        $buildPath = "backup/{$cache['build']}";
        $storage = \Storage::drive('base');
        $storage->makeDirectory($buildPath);
        foreach ($cache['files'] as $file => $stat) {
            try {
                $storage->move($file, "{$buildPath}/{$file}");
                $storage->move("backup/cms/{$file}", $file);
            } catch (\Exception $exception) {
                throw new ResponseHttpException("备份文件失败\n{$buildPath}/{$file}文件已经存在");
            }
        }
        \Cache::forget('updateLists');
        Cloud::find(1)->update(['build' => $cache['build']]);
        put_contents_file('version.php', ['build' => $cache['build']]);
        $storage->deleteDirectory("backup/cms");
        return response(['code' => true]);
    }

    /**
     * 下载完成
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish()
    {
        return view('update.system.finish');
    }
}