<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\SiteService;

class HomeController extends Controller
{
    public function index()
    {
        return view('edu::edu');
    }
}
