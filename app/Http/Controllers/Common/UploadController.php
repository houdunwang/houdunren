<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\ApiController;
use App\Services\UploadServer;
use Illuminate\Http\Request;

/**
 * 站点上传处理
 * Class UploadController
 */
class UploadController extends ApiController
{
  public function __construct()
  {
    $this->middleware(['auth', 'module']);
  }

  public function store(UploadServer $uploadServer, Request $request)
  {
    if ($file = $request->file('file')) {
      $model = $uploadServer->local($file, auth()->id(), site()['id']);
      return $this->json($model);
    }
  }
}
