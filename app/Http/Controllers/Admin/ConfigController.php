<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Services\UplaodService;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('config.edit');
    }

    public function update(Request $request)
    {
    }

    public function upload(Request $request, UplaodService $uplaodService)
    {
        $model =  $uplaodService->image($request->logo);
        return $model;
    }
}
