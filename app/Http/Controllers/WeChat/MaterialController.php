<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChatMaterial;
use App\Services\WeChatService;
use Houdunwang\WeChat\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
  public function index(Request $request)
  {
    $type = $request->query('type', 'image');

    $materials = WeChatMaterial::site()->get();

    return view('wechat.material.index', compact('materials', 'type'));
  }

  public function create(Request $request)
  {
    $type = $request->query('type', 'image');

    return view('wechat.material.create', compact('type'));
  }

  public function store(Request $request, WeChatMaterial $weChatMaterial, Material $material, WeChatService $weChatService)
  {
    $weChatService->config(1);

    // dd($request->input('file'));
    // $type = $request->query('type');

    $image = $material->add('image', $request->input('file'));
    dd($image);

    // $weChatMaterial->type = $type;
    // $weChatMaterial->content = $request->content;
    // $weChatMaterial->save();

    // return response()->json(['message' => '素材创建成功']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\WeChatMaterial  $weChatMaterial
   * @return \Illuminate\Http\Response
   */
  public function show(WeChatMaterial $weChatMaterial)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\WeChatMaterial  $weChatMaterial
   * @return \Illuminate\Http\Response
   */
  public function edit(WeChatMaterial $weChatMaterial)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\WeChatMaterial  $weChatMaterial
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, WeChatMaterial $weChatMaterial)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\WeChatMaterial  $weChatMaterial
   * @return \Illuminate\Http\Response
   */
  public function destroy(WeChatMaterial $weChatMaterial)
  {
    //
  }
}
