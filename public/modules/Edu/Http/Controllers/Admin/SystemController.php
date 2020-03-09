<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Modules\Edu\Entities\System;
use Modules\Edu\Http\Requests\SystemRequest;
use Modules\Edu\Services\SystemService;
use Modules\Edu\Transformers\SystemResource;

/**
 * 系统课程
 * Class SystemController
 */
class SystemController extends ApiController
{
  public function index(SystemService $systemService)
  {
    $lessons = $systemService->get();
    return SystemResource::collection($lessons);
  }

  public function store(SystemRequest $request, System $system)
  {
    $system->fill($request->all())->save();
    $system->lesson()->sync($request->input('lessons'));
    return $this->success('添加成功');
  }

  public function edit(System $system)
  {
    return $this->success('获取单条系统课程', new SystemResource($system));
  }

  public function update(SystemRequest $request, System $system)
  {
    $system->fill($request->all())->save();
    $system->lesson()->sync($request->input('lessons'));
    return $this->success('修改成功');
  }

  public function destroy($id)
  {
  }
}
