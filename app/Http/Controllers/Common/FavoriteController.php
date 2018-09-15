<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

//收藏
class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
