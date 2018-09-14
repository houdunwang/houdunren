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
        $this->update($request);
        return back();
    }

    public function count(Request $request)
    {
        return ['count' => $this->update($request)->count(), 'code' => 0];
    }

    protected function update($request)
    {
        $model = hd_model($request->query('model'), $request->query('id'))->zan();
        $zan = $model->where('user_id', auth()->id())->first();
        if ($zan) {
            $zan->delete();
        } else {
            $model->create(['user_id' => auth()->id()]);
        }
        return $model;
    }
}
