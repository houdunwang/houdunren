<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

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
        $model = model_instance()->favorite();
        $favorite = $model->where('user_id', auth()->id())->first();
        if ($favorite) {
            $favorite->delete();
        } else {
            $model->create(['user_id' => auth()->id()]);
        }
        return back();
    }
}
