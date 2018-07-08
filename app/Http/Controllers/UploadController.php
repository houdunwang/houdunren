<?php

namespace App\Http\Controllers;

use Houdunwang\LaravelUpload\Events\UploadEvent;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function make(Request $request)
    {
        $event = new UploadEvent($request->file('file'));
        event($event);
        ##上传成功的文件y
        dd($event->getFile());
    }

    public function uploadSimditor(Request $request)
    {
        $event = new UploadEvent($request->file('file'));
        event($event);
        return [
            "success"   => true,
            "msg"       => "上传成功",
            "file_path" =>url($event->getFile()),
        ];
    }
}
