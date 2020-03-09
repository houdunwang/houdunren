<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Services\UploadServer;
use Illuminate\Http\Request;

/**
 * 系统模块文件上传
 * Class SystemUploadController
 * @package App\Http\Controllers\System
 */
class UploadController extends ApiController
{
  public function __construct()
  {
    $this->middleware('system');
  }

  /**
   * 系统应用文件上传
   * @param Request $request
   * @param UploadServer $upload
   *
   * @return string
   */
  public function store(Request $request,  UploadServer $uploadServer)
  {
    $file = $request->file('file');
    return $uploadServer->local($file, auth()->id());
  }
}
