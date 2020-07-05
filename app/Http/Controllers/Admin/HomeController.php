<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sites = user()->isSuperAdmin ? Site::all() : auth()->user()->sites;

        return view('admin.index', compact('sites'));
    }

    public function setting()
    {
        return view('admin.setting');
    }
}
