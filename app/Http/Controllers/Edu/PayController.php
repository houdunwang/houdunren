<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(Request $request)
    {

    }
}
