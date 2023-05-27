<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Sign;
use App\Models\User;
use App\Http\Requests\StoreSignRequest;
use App\Http\Resources\SignResource;

class SignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['todaySignList', 'userSignList']);
    }

    //今日签到列表
    public function todaySignList()
    {
        $collection = Sign::whereDate('created_at', now())->oldest()->get();
        return SignResource::collection($collection);
    }

    //用户签到分页数据
    public function userSignList(User $user)
    {
        $collection = $user->signs()->latest()->paginate(10);
        return SignResource::collection($collection);
    }

    public function store(StoreSignRequest $request, Sign $sign)
    {
        $this->authorize('create', Sign::class);
        $sign->fill($request->input())->user()->associate(Auth::user())->save();
        return $this->respondOk('签到成功');
    }

    public function destroy(sign $sign)
    {
        $this->authorize('delete', $sign);
        $sign->delete();
        return $this->respondOk('签到删除成功');
    }
}
