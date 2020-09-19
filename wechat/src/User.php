<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\User\Auth;
use Houdunwang\WeChat\User\Info;

class User extends WeChat
{
  use Info, Auth;
}
