<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use App\Models\WeChatMaterial;
use App\Services\WeChatService;
use Exception;
use Houdunwang\WeChat\Material;
use Houdunwang\WeChat\SendAll;
use Houdunwang\WeChat\SendAllPreview;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
  public function index(Request $request)
  {
    $type = $request->query('type', 'image');

    $materials = WeChatMaterial::site()
      ->where('type', $type)
      ->paginate();

    return view('wechat.material.index', compact('materials', 'type'));
  }

  public function create(Request $request)
  {
    $type = $request->query('type', 'image');

    return view('wechat.material.create', compact('type'));
  }

  public function store(Request $request, WeChatMaterial $weChatMaterial)
  {
    $type = $request->query('type', 'image');

    $upload = $this->addMaterial($type);

    $weChatMaterial->wechat_id = $request->wechat_id;
    $weChatMaterial->media_id = $upload['media_id'];
    $weChatMaterial->info = $upload;
    $weChatMaterial->type = $type;
    $weChatMaterial->site_id = site()['id'];
    $weChatMaterial->module_id = module()['id'];
    $weChatMaterial->content = $request->content;
    $weChatMaterial->save();

    return response()->json(['message' => '素材创建成功']);
  }

  /**
   * 添加素材
   * @param string $type
   * @return mixed
   * @throws BindingResolutionException
   */
  protected function addMaterial(string $type)
  {
    $material = app(Material::class)->config(WeChat::find(request()->wechat_id));

    switch ($type) {
      case 'image':
      case 'voice':
        return $material->add($type, request()->input('content.url'));
      case 'news':
        return $material->addNews(request()->content);
    }
  }

  public function show(WeChatMaterial $material)
  {
    return $material;
  }

  public function edit(Request $request, WeChatMaterial $material)
  {
    $type = $material->type;
    return view('wechat.material.edit', compact('type', 'material'));
  }

  public function update(Request $request, WeChatMaterial $material, WeChatService $weChatService, Material $materialPackage)
  {
    $upload = $this->addMaterial($material->type);

    $material->media_id = $upload['media_id'];
    $material->info = $upload;
    $material->content = $request->content;
    $material->save();

    return response()->json(['message' => '素材修改成功']);
  }

  public function destroy(WeChatMaterial $material, WeChatService $weChatService, Material $materialPackage)
  {
    $weChatService->config($material->wechat_id);
    $materialPackage->del($material['media_id']);
    $material->delete();

    return response()->json(['message' => '图文素材删除成功']);
  }

  public function preview(Request $request, $openid, WeChatMaterial $material, WeChatService $weChatService, Material $materialPackage)
  {
    $weChatService->config($material->wechat_id);
    try {
      call_user_func_array([$materialPackage, $material['type'] . 'MaterialPreview'], [$openid, $material['media_id']]);
      return back()->with('success', '素材预览发送成功');
    } catch (Exception $e) {
      return back()->with('danger', $e->getMessage());
    }
  }
}
