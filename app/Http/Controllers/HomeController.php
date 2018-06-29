<?php

namespace App\Http\Controllers;

use App\Events\UploadEvent;
use App\Exceptions\InvalidException;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        dump(debug_backtrace());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidException
     */
    public function index()
    {
        return view('home');
    }
}
