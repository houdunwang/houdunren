<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\CodeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 个人资料
 * Class UserController
 */
class UserController extends ApiController
{
    public function get()
    {
        return new UserResource(Auth::user());
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

    /**
     * 绑定手机号
     * @param Request $request
     * @param CodeService $codeService
     * @return JsonResponse
     */
    public function mobile(Request $request, CodeService $codeService)
    {
        $request->validate([
            'mobile' => 'required|regex:/^1[3-9]\d{9}$/',
            'code' => 'required'
        ], ['mobile.required' => '手机号不能为空', 'mobile.regex' => '手机号错误', 'code.required' => '验证码不能为空']);

        if ($codeService->check($request->code) === false) {
            return $this->error('验证码错误');
        }
        $user = auth()->user();
        $user->mobile = $request->mobile;
        $user->save();
        return $this->success('手机号绑定成功');
    }

    /**
     * 邮箱绑定
     * @param Request $request
     * @param CodeService $codeService
     * @return JsonResponse
     */
    public function email(Request $request, CodeService $codeService)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required'
        ], ['email.required' => '邮箱不能为空', 'email.email' => '邮箱格式错误', 'code.required' => '验证码不能为空']);

        if ($codeService->check($request->code) === false) {
            return $this->error('验证码错误');
        }
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();
        return $this->success('邮箱绑定成功');
    }
}
