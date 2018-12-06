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
use App\Servers\FavoriteServer;

//收藏
class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 收藏列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())->paginate(1);
        return view('common.favorite_index', compact('favorites'));
    }

    /**
     * 记录或取消收藏
     * @param FavoriteServer $server
     * @return \Illuminate\Http\RedirectResponse
     */
    public function make(FavoriteServer $server)
    {
        $server->make();
        return back();
// $favorite = $model->where('user_id', auth()->id())->first();
//        if ($favorite) {
//            $favorite->delete();
//            return back()->with('success', '取消成功');
//        } else {
//            $model->create(['user_id' => auth()->id()]);
//            return back()->with('success', '收藏成功');
//        }
    }
}
