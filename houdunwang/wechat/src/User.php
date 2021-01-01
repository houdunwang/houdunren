<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\User\Auth;
use Houdunwang\WeChat\User\Get;

/**
 * 粉丝管理
 */
class User extends WeChat
{
    use Get, Auth;
}
