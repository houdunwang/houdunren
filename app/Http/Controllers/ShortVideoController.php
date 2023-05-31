<?php

namespace App\Http\Controllers;

use App\Services\AliyunService;
use App\Http\Controllers\Controller;
use App\Models\ShortVideo;
use App\Http\Requests\StoreShortVideoRequest;
use App\Http\Requests\UpdateShortVideoRequest;
use App\Http\Resources\ShortVideoResource;

class ShortVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        return ShortVideoResource::collection(ShortVideo::latest()->paginate(request('row', 12)));
    }

    public function store(StoreShortVideoRequest $request, ShortVideo $model)
    {
        $this->authorize('create', ShortVideo::class);
        $model->fill($request->input())->save();
        return $this->respondOk('保存成功');
    }

    public function show(ShortVideo $shortVideo)
    {
        $shortVideo->makeVisible(['path']);
        $shortVideo->path = app(AliyunService::class)->videoCdnUrl($shortVideo->path);
        return new ShortVideoResource($shortVideo);
    }

    public function update(UpdateShortVideoRequest $request, ShortVideo $shortVideo)
    {
        $this->authorize('update', $shortVideo);
        $shortVideo->fill($request->input())->save();
        return $this->respondOk('更新成功');
    }

    public function destroy(ShortVideo $shortVideo)
    {
        $this->authorize('delete', $shortVideo);
        $shortVideo->delete();
        return $this->respondOk('删除成功');
    }
}
