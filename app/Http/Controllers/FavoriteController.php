<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

//收藏
class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['getUserFavoriteList']);
    }

    //收藏列表
    public function getUserFavoriteList(string $model, User $user)
    {
        $collection = modelClass()::whereRelation('favorites', 'user_id', $user->id)->paginate(10);
        $resourceClass = 'App\\Http\Resources\\' . $model . "Resource";
        return $resourceClass::collection($collection);
    }

    //收藏或取消收藏资源
    public function toggleFavorite()
    {
        $model = modelInstance();
        $model->favorites()->toggle([Auth::id()]);
        return [
            'total' => $model->favorites()->count(),
            'state' => $model->favorites()->wherePivot('user_id', Auth::id())->exists()
        ];
    }

    //模型收藏信息
    public function modelFavoriteInfo()
    {
        $model = modelInstance();

        return [
            'total' => $model->favorites()->count(),
            'state' => $model->favorites()->wherePivot('user_id', Auth::id())->exists()
        ];
    }
}
