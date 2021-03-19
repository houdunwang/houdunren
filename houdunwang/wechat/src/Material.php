<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Material\Upload;
use Houdunwang\WeChat\Material\Delete;
use Houdunwang\WeChat\Material\Preview;
use Houdunwang\WeChat\Material\Get;
use Houdunwang\WeChat\Material\Edit;
use Houdunwang\WeChat\WeChat;

/**
 * 素材管理
 * @package Houdunwang\WeChat
 */
class Material extends WeChat
{
    use Upload, Get, Edit, Delete, Preview;
}
