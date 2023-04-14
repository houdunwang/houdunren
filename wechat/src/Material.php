<?php

namespace Houdunwang\Wechat;

use Houdunwang\Wechat\Material\Create;
use Houdunwang\Wechat\Material\Delete;
use Houdunwang\Wechat\Material\Preview;

class Material extends WeChat
{
  use Create, Delete, Preview;
}
