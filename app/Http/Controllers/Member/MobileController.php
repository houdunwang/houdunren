<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 绑定手机号
 * Class MobileController
 */
class MobileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function create()
  {
    return view('member.mobile');
  }

  public function store(Request $request)
  {
    dd($request->all());
  }
}
