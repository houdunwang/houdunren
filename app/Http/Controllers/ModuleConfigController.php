<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleConfigController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($name)
    {
        $module = module()['name'] . '::config';
        return view('module_config.edit', compact('module'));
    }

    public function update(Request $request, $name)
    {
        $config = config_get('admin', []);
        $config[$name] = $request->except(['_token', '_method']);
        config_save($config);
        return back()->with('success', '保存成功');
    }

    public function destroy($id)
    {
    }
}
