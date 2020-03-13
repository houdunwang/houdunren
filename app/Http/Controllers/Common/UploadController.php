<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\ApiController;
use App\Models\Site;
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
  }

  /**
   * 系统应用文件上传
   * @param Request $request
   * @param UploadServer $upload
   *
   * @return string
   */
  public function store(Request $request,  UploadServer $uploadServer, Site $site = null)
  {
    $file = $request->file('file');
    $action = $site ? 'site' : 'system';
    return $uploadServer->$action($file, auth()->user(), $site);
  }
}
