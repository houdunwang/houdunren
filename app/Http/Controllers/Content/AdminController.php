<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
   }

    public function index()
    {
        return view('content.admin_index');
    }
}
