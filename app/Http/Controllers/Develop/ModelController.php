<?php

namespace App\Http\Controllers\Develop;

use App\Models\Develop;
use App\Models\Module;
use App\Servers\ModelServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    public function index(Module $module, ModelServer $modelServer)
    {
        $models = $modelServer->lists($module);
        return view('develop.model.index', compact('module', 'models'));
    }

    public function create(Module $module)
    {
        return view('develop.model.create', compact('module'));
    }

    public function store(Request $request, Module $module, ModelServer $modelServer)
    {
        $post = $request->except('_token', 'field');
        $post['fields'] = \GuzzleHttp\json_decode($request->input('fields'), true);
        $modelServer->make($module, $post);
        return redirect(route('develop.model.create', $module))->with('success', '添加成功');
    }

    public function show(Develop $develop)
    {
    }

    public function edit(Develop $develop)
    {
    }

    public function update(Request $request, Develop $develop)
    {
    }

    public function destroy(Develop $develop)
    {
    }
}
