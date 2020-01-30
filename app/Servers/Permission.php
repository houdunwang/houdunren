<?php

namespace App\Servers;

/**
 * 权限服务
 * Class Permission
 * @package App\Servers
 */
class Permission
{
    public static function updateAllModulePermission()
    {
       dump( \Module::all()['A']);
    }
}
