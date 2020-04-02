<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Modules\Edu\Entities\System;
use Modules\Edu\Transformers\Front\SystemResource;

/**
 * 系统课程
 * @package Modules\Edu\Http\Controllers\Front
 */
class SystemController extends ApiController
{
  public function index()
  {
    $lessons = System::latest('id')->get();
    return $this->json($lessons);
  }

  public function show(System $system)
  {
    return new SystemResource($system);
  }
}
