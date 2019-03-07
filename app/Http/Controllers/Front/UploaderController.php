<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Front;

use App\Events\UploadEvent;
use App\Models\Attachment;
use App\Servers\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{
    /**
     * 上传处理
     * @param Request $request
     * @param UploadServer $uploadServer
     */
    public function upload(Request $request, UploadServer $uploadServer)
    {
        event(new UploadEvent('file', function ($path) {
            die(\GuzzleHttp\json_encode(['file' => url($path), 'code' => 0]));
        }));
    }

    /**
     * 文件列表
     * @return array
     */
    public function lists()
    {
        $db = Attachment::where('user_id', auth()->id())->orderBy('id','DESC')->paginate(20);
        $attachments = $db->toArray();
        foreach ($attachments['data'] as $k => $v) {
            $attachments['data'][$k]['url'] = url($v['path']);
        }
        return ['data' => $attachments['data'], 'page' => $db->links() . '', 'code' => 0];
    }
}
