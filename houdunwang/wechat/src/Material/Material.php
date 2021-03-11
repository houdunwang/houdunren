<?php

namespace Houdunwang\WeChat\Material;

use Houdunwang\WeChat\Material\Traits\Create;
use Houdunwang\WeChat\Material\Traits\Delete;
use Houdunwang\WeChat\Material\Traits\Preview;
use Houdunwang\WeChat\WeChat;

/**
 * 素材管理
 * @package Houdunwang\WeChat
 */
class Material extends WeChat
{
    use Create, Delete, Preview;
}
