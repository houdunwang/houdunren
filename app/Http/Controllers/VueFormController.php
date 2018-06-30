<?php

namespace App\Http\Controllers;

use Houdunwang\LaravelUpload\Events\UploadEvent;
use Illuminate\Http\Request;
use Houdunwang\LaravelUpload\Exceptions\UploadException;
//测试vue-form 上传组件
class VueFormController extends Controller
{
    public function upload(Request $request){
        $event = new UploadEvent($request->file('file'));
        event($event);
        return ['file'=>url($event->getFile()),'code'=>0];
    }
}
