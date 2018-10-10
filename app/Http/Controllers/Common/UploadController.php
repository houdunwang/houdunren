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
    //只处理图片上传
    public function upload(Request $request, UploadServer $uploadServer)
    {
        //普通上传
        if ($file = $request->file('file')) {
            $path = $uploadServer->upload($file, $this->isImage($file) ? 'image' : 'file');
            \Auth::user()->attachment()->create(['filename' => $file->getClientOriginalName(), 'path' => url($path)]);
            return ['file' => url($path), 'code' => 0];
        } elseif ($content = $request->input('file')) {
            $file = $uploadServer->uploadBase64Image($content);
            return ['file' => url($file), 'code' => 0];
        }
    }

    //图片类型检测
    protected function isImage($file)
    {
        $ext = $file->getClientOriginalExtension();
        return in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']);

    }

    public function lists()
    {
        $db = Attachment::paginate(20);
        $attachments = $db->toArray();
        foreach ($attachments['data'] as $k => $v) {
            $attachments['data'][$k]['url'] = url($v['path']);
        }
        return ['data' => $attachments['data'], 'page' => $db->links() . '', 'code' => 0];
    }
}
