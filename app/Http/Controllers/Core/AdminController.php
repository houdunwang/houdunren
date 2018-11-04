<?php

namespace App\Http\Controllers\Core;

use App\Models\Module;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //后台主页
    public function home()
    {
        return view('core.admin.home');
    }

    //系统管理
    public function index()
    {
        return view('core.admin.index');
    }
}
