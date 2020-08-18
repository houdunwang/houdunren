<?php

namespace App\Http\Controllers\Common;

use Illuminate\Routing\Controller;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make($model, int $id, $module = null)
    {
        if ($module) {
            $class = 'Modules\\' . $module . '\Entities\\' . $model;
        } else {
            $class = 'App\Models\\' . $model;
        }
        app($class)
            ->findOrFail($id)
            ->favorite();
        return back();
    }
}
