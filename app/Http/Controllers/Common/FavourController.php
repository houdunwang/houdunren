<?php

namespace App\Http\Controllers\Common;

use Illuminate\Routing\Controller;

class FavourController extends Controller
{
    public function make($model, int $id, $module = null)
    {
        if ($module) {
            $class = 'Modules\\' . $module . '\Entities\\' . $model;
        } else {
            $class = 'App\Models\\' . $model;
        }
        app($class)
            ->findOrFail($id)
            ->favour();

        return back();
    }
}