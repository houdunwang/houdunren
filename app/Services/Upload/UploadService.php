<?php

namespace App\Services\Upload;

use Auth;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use App\Models\Attachment;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 文件上传
 * @package App\Services
 */
class UploadService
{
    /**
     * 站点上传
     * @param UploadedFile $file
     * @return mixed
     * @throws BindingResolutionException
     */
    public function make(UploadedFile $file)
    {
        $driver = config('site.upload.driver', 'local');
        return $this->$driver($file);
    }

    /**
     * 本地上传
     * @param UploadedFile $file
     * @return Attachment
     * @throws Exception
     * @throws BindingResolutionException
     */
    protected function local(UploadedFile $file)
    {
        $path =  $file->store(date('Ym'), 'attachment');
        return $this->save($file, url("/attachments/{$path}"));
    }

    /**
     * 阿里云OSS
     * @param UploadedFile $file
     * @return Attachment
     */
    protected function oss(UploadedFile $file): Attachment
    {
        $object = Auth::id() . '-' . date('Ymdhis') . '.' . $file->extension();
        $ossClient = new OssClient(config('site.aliyun.accessKeyId'), config('site.aliyun.accessKeySecret'), config('site.upload.oss.endpoint'));
        $info = $ossClient->uploadFile(config('site.upload.oss.bucket'), $object, $file->path());
        return $this->save($file, $info['oss-request-url']);
    }

    /**
     * 保存入库
     * @param UploadedFile $file
     * @param string $path
     * @return Attachment
     */
    protected function save(UploadedFile $file, string $path): Attachment
    {
        $realFile = $file->getRealPath();
        return Attachment::create([
            'path' => $path,
            'site_id' => site('id'),
            'user_id' => Auth::id(),
            'module_id' => module('id'),
            'size' => filesize($realFile),
            'name' => $file->getClientOriginalName(),
            'extension' => $file->extension(),
        ]);
    }
}
