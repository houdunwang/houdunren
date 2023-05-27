<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//评论或直播截图
class ShotController extends Controller
{
    public function comment()
    {
        $files = collect(glob(public_path('assets/shot/comment/*')));
        return $files->map(
            fn ($file) =>
            url('assets/shot/comment/' . \basename($file))
        );
    }

    public function live()
    {
        $files = collect(glob(public_path('assets/shot/live/*')));
        return $files->map(
            fn ($file) =>
            url('assets/shot/live/' . \basename($file))
        );
    }
}
