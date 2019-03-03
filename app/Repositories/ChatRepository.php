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
use App\Models\Chat;

/**
 * 微信公众号
 * Class WeChatRepository
 * @package App\Repositories
 */
class ChatRepository extends Repository
{
    protected $model = Chat::class;

    /**
     * 获取站点的所有公众号
     * @param Site $site
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getBySite(Site $site)
    {
        return $site->chat;
    }
}