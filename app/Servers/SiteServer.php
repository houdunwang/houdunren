<?php

namespace App\Servers;

use App\Models\Site;
use App\User;

/**
 * 站点管理服务
 * Class SiteServer
 * @package App\Servers
 */
class SiteServer
{
    /**
     * 根据关键词获取用户
     */
    public function getByKeyword(Site $site, ?string $content, $role = ['admin', 'operator', 'user'])
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
            })->get();
    }
    //是否为站长
    public function isAdmin(Site $site, User $user)
    {
        return $site->admin->contains($user);
    }

    //是否为操作员
    public function isOperator(Site $site, User $user)
    {
        return $site->operator->contains($user);
    }
}
