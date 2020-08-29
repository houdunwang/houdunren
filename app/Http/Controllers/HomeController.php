<?php

namespace App\Http\Controllers;

use App\Services\ModuleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $site = get_site_by_domain();
        // site($site);
        if (module() === null) {
            abort(404, '站点没有默认模块');
        }

        module(site()->module['name']);
        $class = 'Modules\\' . site()->module['name'] . '\Http\Controllers\HomeController';
        return app($class)->index($request);
    }
}
