<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Common;

use App\Models\Attachment;
use App\Servers\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * 上传处理
     * @param Request $request
     * @param UploadServer $uploadServer
     * @return array
     * @throws \App\Exceptions\UploadException
     */
    public function upload(Request $request, UploadServer $uploadServer)
    {
        //普通上传
        if ($file = $request->file('file')) {
            $path = $uploadServer->upload($file);
            \Auth::user()->attachment()->create(['filename' => $file->getClientOriginalName(), 'path' => url($path)]);
            return ['file' => url($path), 'code' => 0];
        } elseif ($content = $request->input('file')) {
            $file = $uploadServer->uploadBase64Image($content);
            return ['file' => url($file), 'code' => 0];
        }
    }

    /**
     * 文件列表
     * @return array
     */
    public function lists()
    {
        $db = Attachment::where('user_id', auth()->id())->paginate(20);
        $attachments = $db->toArray();
        foreach ($attachments['data'] as $k => $v) {
            $attachments['data'][$k]['url'] = url($v['path']);
        }
        return ['data' => $attachments['data'], 'page' => $db->links() . '', 'code' => 0];
    }
}
