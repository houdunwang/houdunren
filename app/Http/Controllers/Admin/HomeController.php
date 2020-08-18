<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (user()->isSuperAdmin) {
            $sites = Site::all();
        } else {
            $sites = user()->allSites;
        }

        return view('system.index', compact('sites'));
    }
    public function setting()
    {
        return view('system.setting');
    }
}
