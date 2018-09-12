<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Zan;
use Illuminate\Http\Request;

class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make($model, $id)
    {
        hd_model($model, $id)->zan()->toggle(auth()->id());
        return back();
    }
}
