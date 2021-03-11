<?php

namespace Houdunwang\WeChat\User;

use Houdunwang\WeChat\User\Traits\Auth;
use Houdunwang\WeChat\User\Traits\Get;
use Houdunwang\WeChat\WeChat;

/**
 * 粉丝管理
 * @package Houdunwang\WeChat
 */
class User extends WeChat
{
    use Get, Auth;
}
