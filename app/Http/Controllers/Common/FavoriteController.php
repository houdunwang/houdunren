<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Favorite;

//收藏
class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())->paginate(1);
        return view('common.favorite_index', compact('favorites'));
    }

    public function make()
    {
        $model = hd_model()->favorite();
        $favorite = $model->where('user_id', auth()->id())->first();
        if ($favorite) {
            $favorite->delete();
        } else {
            $model->create(['user_id' => auth()->id()]);
        }
        return back();
    }
}
