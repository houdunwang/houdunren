<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png', 'max:1000']]);

        return $UploadService->image($request->file);
    }
}
