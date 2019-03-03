<?php

namespace Modules\Shop\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopCms;

class CmsController extends Controller
{
    /**
     * 获取更新列表
     * @param $build
     * @return array
     */
    public function index($build)
    {
        $cms = ShopCms::where('build', '>', $build)->orderBy('id', 'desc')->get();
        $response = ['build' => $cms->first()['build'], 'logs' => [], 'files' => []];
        foreach ($cms as $c) {
            $response['logs'] = array_unique(array_merge($response['logs'], $c['logs']));
            $response['files'] = array_merge($response['files'], $c['files']);
        }
        $response['total'] = count($response['files']);
        return $response;
    }

    /**
     * 获取文件内容
     * @param Request $request
     * @return false|string
     */
    public function file(Request $request)
    {
        $file = base_path($request->input('file'));
        return is_file($file) ? file_get_contents($file) : '';
    }
}
