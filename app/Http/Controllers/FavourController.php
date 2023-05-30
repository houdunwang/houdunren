<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Auth;
use Illuminate\Http\Request;

//点赞
class FavourController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function make()
    {
        $model = modelInstance();
        $model->favours()->toggle([Auth::id()]);
        $model->favour_count = $model->favours()->count();
        $model->save();

        return [
            'total' => $model->favour_count,
            'state' => $model->favours()->wherePivot('user_id', Auth::id())->exists(),
            'users' => UserResource::collection($model->favours()->limit(50)->select('users.id', 'name', 'avatar')->get())
        ];
    }

    public function show()
    {
        $model = modelInstance();
        return [
            'total' => $model->favour_count,
            'state' => $model->favours()->wherePivot('user_id', Auth::id())->exists(),
            'users' => UserResource::collection($model->favours()->limit(50)->select('users.id', 'name', 'avatar')->get())
        ];
    }
}
