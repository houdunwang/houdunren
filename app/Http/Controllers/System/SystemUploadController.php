<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\SystemUpload;
use App\Servers\UploadServer;
use Illuminate\Http\Request;

/**
 * 系统模块文件上传
 * Class SystemUploadController
 * @package App\Http\Controllers\System
 */
class SystemUploadController extends ApiController
{
  public function __construct()
  {
    $this->middleware('systemAuth');
  }

  /**
   * 系统应用文件上传
   * @param Request $request
   * @param SystemUpload $systemUpload
   * @param UploadServer $upload
   *
   * @return string
   */
  public function store(Request $request, SystemUpload $systemUpload, UploadServer $upload)
  {
    $path = $upload->local(current($request->file()));
    $systemUpload['path'] = $path;
    $systemUpload->save();
    return url($path);
  }
}
