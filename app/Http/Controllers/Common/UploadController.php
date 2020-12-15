<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Contracts\Container\BindingResolutionException;
use LogicException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 上传处理
 * @package App\Http\Controllers\Common
 */
class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 文件上传
     *
     * @param Request $request
     * @param UploadService $UploadService
     * @return void
     */
    public function make(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3', 'max:2000']]);

        return $UploadService->make($request->file);
    }

    /**
     * 本地上传
     *
     * @param Request $request
     * @param UploadService $UploadService
     * @return void
     */
    public function local(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3', 'max:2000']]);

        return $UploadService->make($request->file);
    }

    /**
     * wangEditor编辑器上传图片
     * @param Request $request
     * @param UploadService $UploadService
     * @return string|false
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function wangEditor(Request $request, UploadService $UploadService)
    {
        $name = key($request->all());

        $request->validate([$name => ['required', 'mimes:jpeg,png', 'max:2500']]);

        $file = $UploadService->make($request[$name]);
        return json_encode([
            'errno' => 0,
            'data' => [$file->path],
        ]);
    }

    /**
     * wangEditor编辑器上传微信图文消息图片
     * @param Request $request
     * @param WeChat $wechat
     * @param Material $material
     * @param UploadService $uploadService
     * @return string|false
     * @throws BindingResolutionException
     * @throws LogicException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function wangEditorMaterialNewsUpload(Request $request, WeChat $wechat, Material $material, UploadService $uploadService)
    {
        $file = $uploadService->make($request->file);
        $image = $material->config($wechat)->uploadNewsImage($file->path);

        return \json_encode([
            'errno' => 0,
            'data' => [$image['url']],
        ]);
    }
}
