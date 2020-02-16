<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\SystemUpload;
use App\Servers\UploadServer;
use Illuminate\Http\Request;

/**
 * 文件上传
 */
class SystemUploadController extends ApiController
{
  public function store(Request $request, SystemUpload $systemUpload, UploadServer $upload)
  {
    $path = $upload->local(current($request->file()));
    $systemUpload['path'] = $path;
    $systemUpload->save();
    return url($path);
  }
}
