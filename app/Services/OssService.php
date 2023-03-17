<?php

namespace App\Services;

use App\Models\Attachment;
use Auth;
use Exception;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Storage;

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
    public function image(UploadedFile $file, $width = 800, $height = 800, $fit = Manipulations::FIT_MAX, $objectPrefix = null)
    {
        $file = $file->store('images/' . date('Ym'));
        $path = storage_path('app/' . $file);
        Image::load($path)->fit($fit,  $width,  $height)->optimize()->save();

        $object = $objectPrefix ? $objectPrefix . '/' . basename($path) : $file;
        $info = $this->ossClient()->uploadFile(config('hd.aliyun.aliyun_oss_block'), $object, $path);
        @unlink($path);
        return $this->toTable(str_replace('http://', 'https://', $info['info']['url']));
    }

    //压缩图片
    public function zipImage(string|null $url, $width = 800, $height = 800, $fit = Manipulations::FIT_MAX, $newObject = '')
    {
        if (empty($url)) return;
        $object = trim(preg_replace('/https?:\/\/.+?\//', '', $url), '/');
        $ossClient = $this->ossClient();
        $exist = $ossClient->doesObjectExist(config('hd.aliyun.aliyun_oss_block'), $object);
        if (!$exist) return;

        $path = public_path('temp.jpg');
        $options = array(OssClient::OSS_FILE_DOWNLOAD => $path);
        $ossClient->getObject(config('hd.aliyun.aliyun_oss_block'), $object, $options);
        if (!getimagesize($path)) return;

        Image::load($path)->fit($fit,  $width,  $height)->optimize()->save();
        $info  = $this->ossClient()->uploadFile(config('hd.aliyun.aliyun_oss_block'), $newObject ?: $object, $path);
        @unlink($path);
        return $info['info']['url'];
    }

    //文本内容保存
    public function string($file, string $content)
    {
        $fileInfo = pathinfo($file);
        $info = $this->ossClient()->putObject(config('hd.aliyun.aliyun_oss_block'), $file, $content);
        $attachment = new Attachment();
        $attachment->url = $info['info']['url'];
        $attachment->name = $fileInfo['filename'];
        $attachment->extension = $fileInfo['extension'];
        $attachment->size = strlen($content);
        Auth::user()->attachments()->save($attachment);
        return $attachment;
    }

    //写入表
    protected function toTable($url)
    {
        $file = request('file');
        $attachment = new Attachment();
        $attachment->url = preg_replace('/^https?:\/\/.+?(?=\/)/i', config('hd.aliyun.cdn_image_domain'), $url);
        $attachment->extension = $file->extension();
        $attachment->size = $file->getSize();
        $attachment->name = $file->getClientOriginalName();
        $attachment->mime = $file->getClientMimeType();

        Auth::user()->attachments()->save($attachment);
        return $attachment;
    }
}
