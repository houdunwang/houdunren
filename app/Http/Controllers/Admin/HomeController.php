<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('system.index', ['sites' => $this->sites()]);
    }

    protected function sites()
    {
        if (user()->isSuperAdmin) {
            return Site::all();
        } else {
            return user()->sites;
        }
    }

    public function setting()
    {
        return view('system.setting');
    }
}
