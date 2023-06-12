<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//对接HDCMS.COM网站
class HdcmsController extends Controller
{
    public function login(Request $request)
    {
        $user = $this->getUser($request->account);
        Validator::make($request->input(), [
            "account" => ['required', function (string $attribute, mixed $value, Closure $fail) use ($user) {
                if (!$user) $fail('用户不存在');
            }],
            'password' => ['required', function (string $attribute, mixed $value, Closure $fail) use ($user, $request) {
                if ($user && !Hash::check($request->password, $user->password)) {
                    $fail('密码输入错误');
                }
            }],
        ], [])->validate();
        return new UserResource($user->load('subscribe'));
    }

    //查找用户
    protected function getUser(string $value = null, array $fields = ['name', 'mobile', 'email'])
    {
        if ($value) {
            $query = User::orderByDesc('id');
            foreach ($fields as $field) {
                $query->orWhere($field, $value);
            }
            return $query->first();
        }
    }
}
