<?php

namespace App\Http\Controllers\Common;

use App\Models\User;
use Auth;
use Illuminate\Routing\Controller;

class FollowerController extends Controller
{
    public function make(User $user)
    {
        $user->fans()->toggle(Auth::id());

        return back();
    }
}
