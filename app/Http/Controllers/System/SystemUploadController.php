<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\SystemUpload;
use App\Servers\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * 文件上传
 */
class SystemUploadController extends ApiController
{
    public function store(Request $request, SystemUpload $systemUpload, Upload $upload)
    {
        $path = $upload->local(current($request->file()));
        $systemUpload['path'] = $path;
        $systemUpload->save();
        return '/' . $path;
    }
}