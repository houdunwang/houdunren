<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Site;
use App\Models\SiteUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员管理
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    protected $model = User::class;

    protected function formatAttribute(array $attributes): array
    {
        $attributes = array_filter($attributes);
        if (isset($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        }
        return $attributes;
    }

    public function create(array $attributes)
    {
        $attributes = $this->formatAttribute($attributes);
        $attributes['lock'] = false;
        $attributes['admin_end'] = (new Carbon())->addDays(config_get('register.days', 7));
        $attributes['group_id'] = config_get('register.group_id', 1, 'system');
        return parent::create($attributes);
    }

    public function update(Model $model, array $attributes)
    {
        return parent::update($model, $this->formatAttribute($attributes));
    }

    /**
     * 为站点添加用户
     * @param User $user
     * @param Site $site
     * @param string $role
     * @return mixed
     */
    public function addSite(User $user, Site $site, $role = 'user')
    {
        $where = [
            ['site_id', $site['id']],
            ['user_id', $user['id']],
        ];
        $has = SiteUser::where($where)->first();
        if (!$has) {
            return $user->sites()->save($site, ['role' => $role]);
        }
    }
}