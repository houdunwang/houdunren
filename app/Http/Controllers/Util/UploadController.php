<?php

namespace App\Http\Controllers\Util;

use App\Models\Attachment;
use App\Servers\UploadServer;
use Houdunwang\LaravelUpload\Events\UploadEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //只处理图片上传
    public function upload(Request $request, UploadServer $uploadServer, Attachment $attachment)
    {
        //普通上传
        if ($file = $request->file('file')) {
            $file = $uploadServer->upload($file, $this->isImage($file) ? 'image' : 'file');
            \Auth::user()->attachment()->create(['filename' => 33, 'path' => url($file)]);
            return ['file' => url($file), 'code' => 0];
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
        return ['data' => $attachments['data'], 'page' => $db->links().'', 'code' => 0];
    }
}
