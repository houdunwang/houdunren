<?php

namespace App\Http\Controllers\Module;

use App\Http\Requests\CoverRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use App\Models\Cover;
use App\Servers\ChatServer;

/**
 * 模块入口微信图文消息
 * Class NewsController
 * @package App\Http\Controllers\Module
 */
class CoverController extends Controller
{
    public function create()
    {
        $cover = $this->model();
        return view('module.cover.create', compact('cover'));
    }

    public function store(CoverRequest $request, ChatServer $server)
    {
        $cover = $this->model();
        \DB::beginTransaction();
        $cover->fill($request->input())->save();
        $server->save($cover);
        \DB::commit();
        return redirect(module_link('module.cover.create'))->with('success', '保存成功');
    }

    protected function model()
    {
        return Cover::firstOrNew(['site_id' => \site()['id'], 'module_id' => \module()['id']], request()->input());
    }
}
