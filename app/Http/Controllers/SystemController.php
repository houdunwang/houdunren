<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\System;
use App\Models\Video;
use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Http\Resources\SystemResource;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        return SystemResource::collection(System::orderBy('order')->when(request('type', 'system'), function ($query, $type) {
            $query->where('type', $type);
        })->latest()->get());
    }

    public function order(Request $request)
    {
        $this->authorize('update', System::class);
        collect($request->input())->each(fn ($system, $index) => System::updateOrCreate(['id' => $system['id']], ['order' => $index]));
        return $this->respondOk('排序成功');
    }

    public function store(StoreSystemRequest $request, System $system)
    {
        $this->authorize('create', System::class);
        $system->fill($request->input())->save();
        return $this->respondOk('添加成功');
    }

    //获取下载地址
    public function downloadUrl(System $system)
    {
        if (isSubscribe()) {
            return $system->download_address;
        }
    }

    //后台获取资料
    public function info(System $system)
    {
        return new SystemResource($system->makeVisible('download_address')->load('lessons'));
    }

    public function show(System $system)
    {
        return new SystemResource($system->load('lessons'));
    }

    public function update(UpdateSystemRequest $request, System $system)
    {
        $this->authorize('update', $system);
        $system->fill($request->input());
        $system->lesson_num = Lesson::where('system_id', $system->id)->count();
        $system->video_num = Video::whereIn('lesson_id', Lesson::where('system_id', $system->id)->pluck('id'))->count();
        $system->save();
        return $this->respondOk('课程更新成功');
    }

    public function destroy(System $system)
    {
        $this->authorize('delete', $system);
        $system->delete();
        return $this->respondOk('课程删除成功');
    }
}
