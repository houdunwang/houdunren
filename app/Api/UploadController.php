<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;
use UploadService;
use App\Models\Site;
use ConfigService;
use SiteService;

/**
 * 上传处理
 * @package App\Http\Controllers\Common
 */
class UploadController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 站点文件上传
     * @param Request $request
     * @return void
     */
    public function site(Request $request)
    {
        $site = site();
        $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3', 'max:2000']]);
        SiteService::cache($site);
        ConfigService::site($site);
        $driver = config('site.upload.driver');
        return UploadService::$driver($request->file);
    }

    /**
     * 本地上传
     * @param Request $request
     * @return void
     */
    public function local(Request $request)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3,gif', 'max:2000']]);
        return UploadService::local($request->file);
    }

    /**
     * wangEditor编辑器上传图片
     * @param Request $request
     * @return void
     */
    public function wangEditor(Request $request)
    {
        $name = key($request->all());
        $request->validate([$name => ['required', 'mimes:jpeg,png', 'max:2500']]);
        $file = UploadService::make($request[$name]);
        return json_encode([
            'errno' => 0,
            'data' => [$file['path']],
        ]);
    }

    /**
     * wangEditor编辑器上传微信图文消息图片
     * @param Request $request
     * @param WeChat $wechat
     * @param Material $material
     * @return void
     */
    public function wangEditorMaterialNewsUpload(Request $request, WeChat $wechat, Material $material)
    {
        $file = UploadService::make($request->file);
        $image = $material->config($wechat)->uploadNewsImage($file['path']);

        return \json_encode([
            'errno' => 0,
            'data' => [$image['url']],
        ]);
    }
}
