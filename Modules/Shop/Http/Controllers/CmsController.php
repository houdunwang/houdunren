<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopCms;

class CmsController extends Controller
{
    public function index()
    {
        $apps = ShopCms::orderBy('id', 'desc')->get();
        return view('shop::cms.index', compact('apps'));
    }

    /**
     * 记录更新列表
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $files = \Storage::drive('base')->files('updateLists');
        foreach ($files as $file) {
            $config = include '../' . $file;
            ShopCms::firstOrCreate(['build' => $config['build']], $config);
        }
        return back()->with('success', 'CMS更新包生成完毕');
    }

    public function store(Request $request)
    {
    }

    public function show()
    {
        return view('shop::show');
    }

    public function edit()
    {
        return view('shop::edit');
    }

    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
