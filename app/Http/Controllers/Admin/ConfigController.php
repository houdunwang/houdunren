<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Services\UploadService;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('config.edit');
    }
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
