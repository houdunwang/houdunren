<?php

namespace App\Servers;

use Illuminate\Http\UploadedFile;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

class UploadServer
{
    //本地文件上传
    public function local(UploadedFile $file)
    {
        $dir = 'attachments/' . date('Y/m');
        $fileName =  time() . microtime(true) . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $fileName);
        return $dir . '/' . $fileName;
    }
}
