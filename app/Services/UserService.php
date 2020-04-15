<?php

namespace App\Services;

use App\Models\Site;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * 邮箱手机号登录
     * @param array $data
     * @param boolean $remember
     *
     * @return void
     */
    public function login(array $data)
    {
        $credentials = $this->credentials($data['account']);
        $credentials['password'] = $data['password'];
        if (auth()->attempt($credentials)) {
            return Auth::user()->createToken('token')->plainTextToken;
        }
        return false;
    }
    /**
     * 注册
     * @param array $data
     * @return mixed
     */
    public function register(array $data)
    {
        $data = array_merge($data, $this->credentials($data['account']));
        $data['password'] = bcrypt($data['password']);
        $user = new User();
        $user->fill($data)->save();
        return $user->createToken('token')->plainTextToken;
    }
    /**
     * 帐号类型
     * @param string $username
     *
     * @return array
     */
    public function credentials(string $username)
    {
        $credentials = [];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $username;
        } else {
            $credentials['mobile'] = $username;
        }
        return $credentials;
    }

    /**
     * 超级管理员检测
     * @return bool
     */
    public function isSuperAdmin(User $user): bool
    {
        return $user['id'] === 1;
    }
    /**
     * 判断用户是否为站点的指定角色
     * @param Site $site
     * @param User $user
     *
     * @return bool
     */
    public function isRole(Site $site, User $user, array $role = [])
    {
        $role = $role ? $role : ['admin', 'operator'];
        return $this->isSuperAdmin($user) || $user->site()->wherePivotIn('role', $role)
            ->where('site_id', $site['id'])->first() ? true : false;
    }

    /**
     * 是否为站长
     * @param Site $site
     * @param User $user
     *
     * @return bool
     */
    public function isAdmin(Site $site, User $user)
    {
        return $site->admin->contains($user);
    }

    /**
     * 是否为操作员
     * @param Site $site
     * @param User $user
     *
     * @return bool
     */
    public function isOperator(Site $site, User $user)
    {
        return $site->operator->contains($user);
    }

    /**
     * 根据关键词获取用户
     * @param Site $site
     * @param ?string $content
     * @param undefined $role
     * @param mixed 'operator'
     * @param mixed 'user']
     *
     * @return App\Model\User
     */
    public function getByKeyword(Site $site, ?string $content, $role = ['admin', 'operator', 'user'], $row = 10)
    {
        return $site->user()
            ->wherePivotIn('role', $role)
            ->where(function ($query) use ($content) {
                if ($content)
                    array_map(
                        function ($field) use ($query, $content) {
                            $query->orWhere($field, 'like', "%{$content}%");
                        },
                        ['name', 'email', 'mobile', 'users.id'],
                    );
            })->paginate($row);
    }
}
