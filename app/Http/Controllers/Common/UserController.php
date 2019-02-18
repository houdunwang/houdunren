<?php

namespace App\Http\Controllers\Common;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function search(UserRepository $repository, Request $request)
    {
        if ($w = $request->input('w')) {
            $users = User::where('name', 'like', "%$w%")
                ->orWhere('email', 'like', "%$w%")
                ->orWhere('mobile', 'like', "%$w%")->paginate(10);
        } else {
            $users = $repository->paginate(8);
        }
        return view('common.user.search', compact('users'));
    }
}
