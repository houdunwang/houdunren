<?php

namespace Houdunwang\Wechat;

use Houdunwang\Wechat\User\Auth;
use Houdunwang\Wechat\User\Get;

/**
 * 粉丝管理
 */
class User extends Wechat
{
    use Get, Auth;
}
