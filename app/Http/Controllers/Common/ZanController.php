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
        $model = hd_model($request->query('model'), $request->query('id'));
        $model->zan()->toggle(auth()->user());
        if ($request->ajax()) {
            return ['count' => $model->zan->count(), 'code' => 0];
        } else {
            return back();
        }
    }
}
