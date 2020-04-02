<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Modules\Edu\Entities\Subscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;
use Modules\Edu\Services\SubscribeService;

class SubscribeController extends ApiController
{
  public function __construct()
  {
  }
  public function index(SubscribeService $subscribeService)
  {
    return $this->json($subscribeService->get());
  }

  public function store(SubscribeRequest $request, Subscribe $subscribe)
  {
    $subscribe->fill($request->all())->save();
    return $this->success('添加成功');
  }

  public function edit(Subscribe $subscribe)
  {
    return $this->json($subscribe);
  }

  public function update(SubscribeRequest $request, Subscribe $subscribe)
  {
    $subscribe->fill($request->all())->save();
    return $this->success('更新成功');
  }

  public function destroy(Subscribe $subscribe)
  {
    $subscribe->delete();
    return $this->success('删除成功');
  }
}
