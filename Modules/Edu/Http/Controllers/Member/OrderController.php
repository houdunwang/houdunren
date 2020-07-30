<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = User::make()->orders()->where('status', true)->paginate();
        return view('edu::member.order', compact('orders'));
    }
}
