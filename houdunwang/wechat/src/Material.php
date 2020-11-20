<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Material\Create;
use Houdunwang\WeChat\Material\Delete;
use Houdunwang\WeChat\Material\Preview;

class Material extends WeChat
{
  use Create, Delete, Preview;
}
