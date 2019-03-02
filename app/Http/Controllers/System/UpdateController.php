<?php

namespace App\Http\Controllers\System;

use App\Models\Cloud;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 系统更新
 * Class UpdateController
 * @package App\Http\Controllers\System
 */
class UpdateController extends Controller
{
    protected $client;
    protected $host;

    public function __construct()
    {
        $this->host = Cloud::find(1)['api_host'] ?? config('app.api_host') . '/app';
        $this->client = new Client(['base_uri' => $this->host . '/cms/']);
    }

    /**
     * 检测更新
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check()
    {
        $build = Cloud::find(1)['build'] ?? null;
        $response = $this->client->request('GET', "$build");
        $update = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        //检测目录权限
        foreach ($update['files'] as $file => $stat) {
            if (!is_writable('../' . dirname($file))) {
                return back()->with('info', dirname($file) . '目录\r\n没有写入权限,不能执行更新操作');
            }
        }
        $this->cache($update);
        return view('system.update.check', compact('update'));
    }

    /**
     * 下载界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function downloadShow()
    {
        $update = \Cache::get('updateLists');
        if (!$update['total']) {
            return redirect(route('cloud.update.check'));
        }
        return view('system.update.download_show', compact('update'));
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
            return redirect()->route('cloud.update.check');
        }
        foreach ($cache['files'] as $file => $stat) {
            if ($stat != 'downloaded') {
                $this->downFile($file);
                return response(['message' => "file", 'file' => $file]);
            }
        }
        return response(['message' => 'success']);
    }

    /**
     * 下载文件
     * @param string $file
     * @return null
     * @throws \GuzzleHttp\Exception\GuzzleException | \Exception
     */
    protected function downFile(string $file)
    {
        $response = $this->client->request('POST', "file", ['form_params' => ['file' => $file]]);
        if ($response->getStatusCode() == 200) {
            $content = $response->getBody()->getContents();
            \Storage::drive('base')->makeDirectory('backup/cms/' . dirname($file));
            if (!file_put_contents('../backup/cms/' . $file, $content)) {
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
    public function moveShow()
    {
        $update = \Cache::get('updateLists');
        return view('system.update.move_show', compact('update'));
    }

    /**
     * 备份旧版本与更新新文件
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function moveFile()
    {
        $cache = \Cache::get('updateLists');
        \Artisan::call('migrate');
        $buildPath = "backup/{$cache['build']}";
        $storage = \Storage::drive('base');
        $storage->makeDirectory($buildPath);
        foreach ($cache['files'] as $file => $stat) {
            $storage->move($file, "{$buildPath}/{$file}");
            $storage->move("backup/cms/{$file}", $file);
        }
        \Cache::forget('updateLists');
        Cloud::find(1)->update(['build' => $cache['build']]);
        $storage->deleteDirectory("backup/cms");
        return response(['code' => true]);
    }

    /**
     * 下载完成
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish()
    {
        return view('system.update.finish');
    }
}
