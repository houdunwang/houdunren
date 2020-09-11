<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png', 'max:1000']]);

        return $UploadService->make($request->file);
    }
}
