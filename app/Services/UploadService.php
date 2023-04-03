<?php

namespace App\Services;

use App\Models\Upload;
use Auth;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class UploadService
{
    //图片上传
    public function image(UploadedFile $file, $width = 800, $height = 800, $fit = Manipulations::FIT_MAX)
    {
        $localFile = $this->local($file);

        Image::load($localFile)->fit($fit,  $width,  $height)->optimize()->save();
        $drive = config('hd.upload.drive');
        $url = url($localFile);

        if ($drive === 'oss')  $url = $this->oss($localFile);

        return $this->toTable($url, $file);
    }

    //本地上传
    public function local(UploadedFile $file)
    {
        $file = $file->store('public/' . date('Ym'));

        return preg_replace('/^public\//', 'storage/', $file);
    }

    //阿里OSS
    public function oss(string $file)
    {
        $info = app(OssService::class)->file($file);
        $url = str_replace('http://', 'https://', $info['info']['url']);
        $url = preg_replace('/^https?:\/\/.+?(?=\/)/i', config('hd.aliyun.cdn_image_domain'), $url);
        @unlink($file);
        return $url;
    }

    //写入表
    protected function toTable($url, UploadedFile $file)
    {
        $model = new Upload();
        $model->url = $url;
        $model->extension = $file->extension();
        $model->size = $file->getSize();
        $model->name = $file->getClientOriginalName();
        $model->mime = $file->getClientMimeType();
        Auth::user()->uploads()->save($model);
        return $model;
    }
}
