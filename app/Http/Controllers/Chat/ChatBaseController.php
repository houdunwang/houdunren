<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\ChatBase;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bases = ChatBase::get();
        return view('chat.base_index', compact('bases'));
    }

    public function create()
    {
        return view('chat.base_create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ChatBase $chatBase)
    {
        //
    }

    public function edit(ChatBase $chatBase)
    {
        //
    }

    public function update(Request $request, ChatBase $chatBase)
    {
        //
    }

    public function destroy(ChatBase $chatBase)
    {
        //
    }
}
