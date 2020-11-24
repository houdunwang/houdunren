<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;
use App\Models\User;

/**
 * 订阅会员
 * @package Modules\Edu\Http\Controllers\Front
 */
class SubscribeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $duration = User::make(user('id'))->duration;

    if ($duration && $duration['end_time'] > now()) {
      return redirect()->route('Edu.member.duration')->with('success', '你已经订阅会员');
    }

    $subscribes = Subscribe::all();
    return view('edu::front.subscribe.index', compact('subscribes'));
  }
}
