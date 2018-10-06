<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\ChatDefault;
use Illuminate\Http\Request;

class ChatDefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $message = ChatDefault::firstOrNew(['id' => 1]);
        return view('chat.default_edit', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         ChatDefault::firstOrNew(['id' => 1])->fill($request->all())->save();
         return back()->with('success','保存成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatDefault $chatDefault
     * @return \Illuminate\Http\Response
     */
    public function show(ChatDefault $chatDefault)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatDefault $chatDefault
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatDefault $chatDefault)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ChatDefault $chatDefault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatDefault $chatDefault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatDefault $chatDefault
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatDefault $chatDefault)
    {
        //
    }
}
