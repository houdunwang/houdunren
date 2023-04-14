<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Upload;
use Auth;
use Exception;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ImageService
{

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
}
