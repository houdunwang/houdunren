<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Notifications\FollowerNotification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
    }

    public function edit(User $user, Request $request)
    {
        $this->authorize('update', $user);
        return view('user.' . $request->query('type'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return back()->with('success', '资料修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function follow(User $user)
    {
        $this->authorize('follow', $user);
        auth()->user()->follower()->toggle([$user->id]);
        return back();
    }
}
