<?php

namespace App\Services;

use OSS\OssClient;

//阿里OSS上传服务
class OssService
{
    public function ossClient()
    {
        $accessKeyId = config('hd.aliyun.aliyun_key');
        $accessKeySecret = config('hd.aliyun.aliyun_secret');
        $endpoint = config('hd.aliyun.aliyun_oss_endpoint');
        return new OssClient($accessKeyId, $accessKeySecret, $endpoint);
    }

    //图片上传
    public function file(string $file)
    {
        return $this->ossClient()->uploadFile(config('hd.aliyun.aliyun_oss_block'), $file, $file);
    }

    //文本内容保存
    // public function string($file, string $content)
    // {
    //     $fileInfo = pathinfo($file);
    //     $info = $this->ossClient()->putObject(config('hd.aliyun.aliyun_oss_block'), $file, $content);
    //     $attachment = new Upload();
    //     $attachment->url = $info['info']['url'];
    //     $attachment->name = $fileInfo['filename'];
    //     $attachment->extension = $fileInfo['extension'];
    //     $attachment->size = strlen($content);
    //     Auth::user()->attachments()->save($attachment);
    //     return $attachment;
    // }
}
