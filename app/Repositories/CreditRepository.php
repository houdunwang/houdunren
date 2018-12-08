<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-08
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Credit;

/**
 * 会员积分
 * Class CreditRepository
 * @package App\Repositories
 */
class CreditRepository extends Repository implements RepositoryInterface
{
    protected $name = Credit::class;

    public function saveAll(array $credits)
    {
        return collect($credits)->map(function ($credit) {
            $credit['status'] = $credit['status'] ?? 0;
            $credit['unit'] = $credit['unit'] ?? '个';
            $credit['title'] = $credit['title'] ?? null;
            Credit::firstOrNew(['name' => $credit['name']])->fill($credit)->save();
        });
    }
}