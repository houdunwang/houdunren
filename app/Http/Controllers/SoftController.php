<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftRequest;
use App\Http\Requests\UpdateSoftRequest;
use App\Http\Resources\SoftResource;
use App\Http\Resources\TopicResource;
use App\Models\Soft;
use Illuminate\Http\Request;

class SoftController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show', 'checkUpdate']);
    }

    public function index()
    {
        return TopicResource::collection(Soft::latest()->get());
    }

    public function store(StoreSoftRequest $request, Soft $soft)
    {
        $soft->fill($request->input())->save();
        return $this->respondWithSuccess(new SoftResource($soft));
    }

    public function show(Soft $soft)
    {
        return $this->respondWithSuccess(new SoftResource($soft));
    }

    public function update(UpdateSoftRequest $request, Soft $soft)
    {
        $soft->fill($request->input())->save();
        return $this->respondWithSuccess(new SoftResource($soft));
    }

    public function destroy(Soft $soft)
    {
        $this->authorize('delete', $soft);
        $soft->delete();
        return $this->respondOk('删除成功');
    }

    //验证软件更新
    public function checkUpdate(Request $request)
    {
        $request->validate([
            'app' => ['required', 'exists:softs,name'],
            'version' => ['required']
        ]);

        $soft = Soft::whereName($request->app)->first();
        if (version_compare($soft->version, $request->version) > 0) {
            return $this->respondWithSuccess(['code' => 1, 'message' => '有新版本']);
        }
        return $this->respondWithSuccess(['code' => 0, 'message' => '你使用的是最新版本']);
    }
}
