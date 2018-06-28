<?php

namespace App\Http\Controllers\Handle;

use App\Events\UploadEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function make(Request $request)
    {
        $file = $request->file('file');
        event(new UploadEvent($file));
    }
}
