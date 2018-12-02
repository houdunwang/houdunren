<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.admin.home');
    }

    //系统管理
    public function index()
    {
//        dd(module_menu('content'));
        return view('admin.admin.index');
    }
}
