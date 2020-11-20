<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\User\Auth;
use Houdunwang\WeChat\User\Get;

class User extends WeChat
{
  use Get, Auth;
}
