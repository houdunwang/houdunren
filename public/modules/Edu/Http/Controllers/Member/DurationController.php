<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Duration;

/**
 * 会员周期
 * @package Modules\Edu\Http\Controllers\Member
 */
class DurationController extends Controller
{
  public function get()
  {
    return Duration::where('user_id', Auth::id())->first();
  }
}
