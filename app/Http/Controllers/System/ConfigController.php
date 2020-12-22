<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Services\UploadService;
use Illuminate\Http\Request;

/**
 * 系统配置
 * @package App\Http\Controllers\System
 */
class ConfigController extends Controller
{
    /**
     * 编辑配置项
     *
     * @return void
     */
    public function edit()
    {
        $config = Config::first();
        return inertia()->render('System/Config/Edit', compact('config'));
    }

    /**
     * 更新配置
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        Config::updateOrCreate(['id' => 1], ['config' => $request->except(['_token', '_method'])]);

        return back()->with('success', '修改成功');
    }

    public function upload(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png', 'max:1000']]);
        return $UploadService->image($request->file);
    }
}
