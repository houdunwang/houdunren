<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UploadServer;
use GuzzleHttp\Psr7\Request;

/**
 * 个人资料
 * Class UserController
 */
class UserController extends ApiController
{
  public function __construct()
  {
    $this->middleware(['auth:api', 'front']);
  }

  public function show()
  {
    return $this->json(new UserResource(auth()->user()));
  }

  public function update(UserRequest $request)
  {
    $data = $this->password($request->all());
    $user = auth()->user();
    $user->fill($data)->save();
    return $this->success('修改成功');
  }

  protected function password($data)
  {
    if (isset($data['password'])) {
      $data['password'] = bcrypt($data['password']);
    }
    return $data;
  }

  /**
   * 头像上传
   * @param UploadServer $uploadServer
   * @param Request $request
   *
   * @return Model
   */
  public function avatar(UploadServer $uploadServer, Request $request)
  {
    if ($file = $request->file('file')) {
      $model = $uploadServer->local($file, auth()->id(), site()['id']);
      return $this->json($model);
    }
  }
}
