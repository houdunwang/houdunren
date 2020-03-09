<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Services\UploadServer;
use Illuminate\Http\Request;

/**
 * 模块后台上传
 * Class UploadController
 */
class UploadController extends Controller
{
  public function __construct()
  {
    $this->middleware('module');
  }

  public function store(Request $request, UploadServer $uploadServer)
  {
    $file = $request->file('file');
    return  $uploadServer->local($file, auth()->id(), site()['id']);
  }
}
