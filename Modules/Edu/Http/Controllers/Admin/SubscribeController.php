<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;

class SubscribeController extends Controller
{

    public function index()
    {
        $subscribes = Subscribe::all();
        return view('edu::subscribe.index', compact('subscribes'));
    }

    public function create(Subscribe $subscribe)
    {
        return view('edu::subscribe.create', compact('subscribe'));
    }

    public function store(SubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->fill($request->input());
        $subscribe['site_id'] = site()['id'];
        $subscribe->save();

        return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
    }

    public function edit(Request $request, Subscribe $subscribe)
    {
        return view('edu::subscribe.edit', compact('subscribe'));
    }

    public function update(SubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->fill($request->input());
        $subscribe->save();
        return redirect()->route('Edu.admin.subscribe.index')->with('success', '套餐保存成功');
    }

    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return response()->json(['message' => '套餐删除成功']);
    }
}
