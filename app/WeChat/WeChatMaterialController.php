<?php

namespace App\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeChatMaterialResource;
use App\Http\Requests\WeChatMaterialRequest;
use App\Models\WeChatMaterial;
use App\Models\WeChat;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;
use App\Models\Site;

/**
 * 素材管理
 * @package App\WeChat
 */
class WeChatMaterialController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(WeChatMaterial::class, 'material');
    }

    /**
     * 素材列表
     * @param WeChat $wechat
     * @return void
     */
    public function index(Request $request, Site $site, WeChat $wechat)
    {
        $materials = $wechat->materials()->where('type', $request->type)->when($request->duration, function ($query, $duration) {
            return $query->where('duration', $duration);
        })->paginate(10);
        return WeChatMaterialResource::collection($materials);
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
    public function store(WeChatMaterialRequest $request, Site $site, WeChat $wechat, WeChatMaterial $material)
    {
        $package = app(Material::class)->init($wechat);
        // return $request->input();
        if ($request->type == 'news') {
            $media = $package->addNews($request->content);
        } else {
            $media = $package->add($request->type, $request->file, $request->duration);
        }
        $wechat->materials()->create($request->input() + ['media' => $media]);
        return $this->message('素材添加成功', new WeChatMaterialResource($material));
    }

    /**
     * 更新素材
     *
     * @param WeChatMaterialRequest $request
     * @param WeChatMaterial $material
     * @return void
     */
    public function update(WeChatMaterialRequest $request, Site $site, WeChat $wechat,  WeChatMaterial $material)
    {
        if ($request->file != $material->file) {
            $media = app(Material::class)->init($wechat)->add($request->type, $request->file, $request->duration);
            $material->media = $media;
        }
        $material->fill($request->except(['media']))->save();
        return $this->message('素材修改成功', new WeChatMaterialResource($material));
    }

    /**
     * 删除素材
     * @param WeChatMaterial $material
     * @return void
     */
    public function destroy(Site $site, WeChat $wechat, WeChatMaterial $material)
    {
        $material->delete();
        if ($material->duration == 'long') {
            app(Material::class)->init($wechat)->del($material->media_id);
        }
        return $this->message('素材删除成功');
    }
}
