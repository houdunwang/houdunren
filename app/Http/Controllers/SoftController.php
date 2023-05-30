<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftRequest;
use App\Http\Requests\UpdateSoftRequest;
use App\Http\Resources\SoftResource;
use App\Http\Resources\TopicResource;
use App\Models\Soft;
use App\Models\Topic;

class SoftController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
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
}
