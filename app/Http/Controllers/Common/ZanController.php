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
use Illuminate\Http\Request;

//点赞
class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 点赞
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function make(Request $request)
    {
        $model = model_instance()->zan();
        $zan = $model->where('user_id', auth()->id())->first();
        if ($zan) {
            $zan->delete();
        } else {
            $model->create(['user_id' => auth()->id()]);
        }

        if ($request->ajax()) {
            return ['count' => model_instance()->zan_num, 'code' => 0];
        }
        return back();
    }
}
