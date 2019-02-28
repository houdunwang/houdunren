<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        $action = \Browser::isMobile() ? 'mobile' : 'pc';
        return app()->call(HomeController::class . '@' . $action);
    }

    public function pc()
    {
        return app()->call(InfoController::class . '@index');
    }

    public function mobile()
    {
        return view('member.home.mobile');
    }
}
