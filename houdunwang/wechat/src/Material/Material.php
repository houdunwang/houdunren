<?php

namespace Houdunwang\WeChat\Material;

use Houdunwang\WeChat\Material\Traits\Upload;
use Houdunwang\WeChat\Material\Traits\Delete;
use Houdunwang\WeChat\Material\Traits\Preview;
use Houdunwang\WeChat\Material\Traits\Get;
use Houdunwang\WeChat\Material\Traits\Edit;
use Houdunwang\WeChat\WeChat;

/**
 * 素材管理
 * @package Houdunwang\WeChat
 */
class Material extends WeChat
{
    use Upload, Get, Edit, Delete, Preview;
}
