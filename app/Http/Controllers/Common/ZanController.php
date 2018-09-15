<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(Request $request)
    {
        $model = hd_model()->zan();
        $zan = $model->where('user_id', auth()->id())->first();
        if ($zan) {
            $zan->delete();
        } else {
            $model->create(['user_id' => auth()->id()]);
        }

        if ($request->ajax()) {
            return ['count' => hd_model()->zan_num, 'code' => 0];
        }
        return back();
    }
}
