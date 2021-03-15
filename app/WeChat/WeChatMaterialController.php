<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeChatMaterialResource;
use App\Http\Requests\WeChatMaterialRequest;
use App\Models\WeChatMaterial;
use App\Models\WeChat;
use Houdunwang\WeChat\Material\Material;
use UploadService;
use SiteService;

/**
 * 素材管理
 * @package App\WeChat
 */
class WeChatMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(WeChatMaterial::class, 'material');
    }

    /**
     * 素材列表
     * @param WeChat $wechat
     * @return void
     */
    public function index(WeChat $wechat)
    {
        return WeChatMaterialResource::collection($wechat->materials);
    }

    /**
     * 获取素材
     * @param WeChatMaterial $material
     * @return WeChatMaterial
     */
    public function show(WeChatMaterial $material)
    {
        return new WeChatMaterialResource($material);
    }

    /**
     * 上传素材
     * 图片、音频、缩略图、视频
     * @param WeChatMaterialRequest $request
     * @param WeChat $wechat
     * @return void
     */
    public function store(WeChatMaterialRequest $request, WeChat $wechat, WeChatMaterial $material)
    {
        SiteService::cache($wechat->site);
        //上传文件
        $file = UploadService::make($request->file);
        $media = app(Material::class)->init($wechat)->add($request->type, $file->path, request('duration'));
        $wechat->materials()->create([
            'type' => $request->type,
            'duration' => $request->duration,
            'content' => ['file' => $file],
            'media' => $media
        ]);
        return $this->message('素材添加成功', new WeChatMaterialResource($material));
    }

    /**
     * 更新素材
     *
     * @param WeChatMaterialRequest $request
     * @param WeChatMaterial $material
     * @return void
     */
    public function update(WeChatMaterialRequest $request, WeChatMaterial $material)
    {
        $material->fill($request->input())->save();
        return $this->message('素材修改成功', new WeChatMaterialResource($material));
    }

    /**
     * 删除素材
     * @param WeChatMaterial $material
     * @return void
     */
    public function destroy(WeChatMaterial $material)
    {
        $material->delete();
        return $this->message('素材删除成功');
    }
}
