<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\System;

use App\Events\UploadEvent;
use App\Models\Attachment;
use App\Servers\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 上传管理
 * Class UploaderController
 * @package App\Http\Controllers\System
 */
class UploaderController extends Controller
{
    public function make()
    {
        $config['upload'] = config_get('upload', ['type' => 'local'], 'system');
        $config['aliyun'] = config_get('aliyun', [], 'system');
        event(new UploadEvent('file', $config, function ($path) {
            die(\GuzzleHttp\json_encode(['file' => $path, 'code' => 0]));
        }));
    }

    /**
     * 文件列表
     * @return array
     */
    public function lists()
    {
        $db = Attachment::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(20);
        $attachments = $db->toArray();
        foreach ($attachments['data'] as $k => $v) {
            $attachments['data'][$k]['url'] = url($v['path']);
        }
        return ['data' => $attachments['data'], 'page' => $db->links() . '', 'code' => 0];
    }
}
