<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UploadService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;

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

  public function get()
  {
    return $this->json(new UserResource(auth()->user()));
  }

  public function update(UserRequest $request)
  {
    auth()->user()->fill($request->all())->save();
    return $this->success('修改成功');
  }

  public function password(UserRequest $request)
  {
    $user = auth()->user();
    if (!Hash::check($request->origin_password, $user->password)) {
      return $this->error('原密码错误');
    }
    $user->password = Hash::make($request->password);
    $user->save();
    return $this->success('修改成功');
  }
}
