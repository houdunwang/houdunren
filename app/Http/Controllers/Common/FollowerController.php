<?php

namespace App\Http\Controllers\Common;

use App\Models\User;
use Auth;
use Illuminate\Routing\Controller;

class FollowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(User $user)
    {
        if ($user->isFans) {
            $user->fans()->detach(Auth::id(), [
                'site_id' => site()['id'],
                'module_id' => module()['id']
            ]);
        } else {
            $user->fans()->attach(Auth::id(), [
                'site_id' => site()['id'],
                'module_id' => module()['id']
            ]);
        }

        return back();
    }
}
