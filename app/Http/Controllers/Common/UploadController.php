<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;
use App\Services\UploadService;

class UploadController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function make(Request $request, UploadService $UploadService)
  {
    $request->validate(['file' => ['required', 'mimes:jpeg,png,mp3', 'max:2500']]);

    return $UploadService->make($request->file);
  }

  public function wangEditor(Request $request, UploadService $UploadService)
  {
    $request->validate(['file' => ['required', 'mimes:jpeg,png', 'max:2500']]);

    $file = $UploadService->make($request->file);
    return json_encode([
      'errno' => 0,
      'data' => [$file->path],
    ]);
  }

  /**
   * wangEditor编辑器上传微信图文消息图片
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
