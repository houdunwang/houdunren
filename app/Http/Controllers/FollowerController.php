<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['make']);
    }

    //关注列表
    public function follower(User $user)
    {
        return UserResource::collection($user->followers()->paginate(10));
    }

    //粉丝列表
    public function fans(User $user)
    {
        return UserResource::collection($user->fans()->paginate(10));
    }

    //关注用户
    public function make(User $user)
    {
        Auth::user()->followers()->toggle([$user->id]);
        return $this->success('操作成功', Auth::user()->followers()->wherePivot('follower_id', $user->id)->exists());
    }
}
