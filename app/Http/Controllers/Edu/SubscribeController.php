<?php

namespace App\Http\Controllers\Edu;

use App\Models\EduSubscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $subscribe = EduSubscribe::where('user_id', auth()->id())->first();
        return view('edu.subscribe.show', compact('subscribe'));
    }
}
