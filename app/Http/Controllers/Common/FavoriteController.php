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

    public function make($model, $id)
    {
        hd_model($model,$id)->favorite()->toggle(auth()->id());
        return back();
    }
}
