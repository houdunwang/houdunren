<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;
use App\Models\WeChat;
use UploadService;

/**
 * 上传处理
 * @package App\Http\Controllers\Common
 */
class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'site']);
    }

    /**
     * 文件上传
     * @param Request $request
     * @return void
     */
    public function upload(Request $request)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3,mp4', 'max:20000']]);
        return UploadService::make($request->file);
    }

    /**
     * wangEditor编辑器上传图片
     * @param Request $request
     * @return void
     */
    public function wangEditor(Request $request)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,jpg,bmp,png']]);
        $file = UploadService::make($request->file);
        return [
            'errno' => 0,
            'data' => [
                ['url' => $file['path'], 'alt' => $file['name'], 'href' => $file['path']]
            ]
        ];
    }

    /**
     * wangEditor编辑器上传微信图文消息图片
     * @param Request $request
     * @param WeChat $wechat
     * @param Houdunwang\WeChat\Material $material
     * @return string|false
     */
    public function wangEditorMaterialNewsUpload(Request $request, WeChat $wechat, Material $material)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,jpg,bmp,png']]);
        $file = UploadService::make($request->file);
        $image = $material->config($wechat)->uploadNewsImage($file['path']);
        return \json_encode([
            'errno' => 0,
            'data' => [$image['url']],
        ]);
    }
}
