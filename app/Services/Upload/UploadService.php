<?php

namespace App\Services\Upload;

use Auth;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use App\Models\Attachment;
use Illuminate\Support\Collection;

/**
 * 文件上传
 * @package App\Services
 */
class UploadService
{
    /**
     * 本地上传
     *
     * @return void
     */
    public function local(UploadedFile $file)
    {
        $path =  $file->store(date('Ym'), 'attachment');

        return $this->save($file, "/attachments/{$path}");
    }

    /**
     * 云上传
     *
     * @param UploadedFile $file
     * @return Attachment
     */
    public function make(UploadedFile $file): Attachment
    {
        $object = Auth::id() . '-' . date('Ymdhis') . '.' . $file->extension();
        $ossClient = new OssClient(config('site.aliyun.accessKeyId'), config('site.aliyun.accessKeySecret'), config('site.aliyun.oss.endpoint'));
        $info = $ossClient->uploadFile(config('site.aliyun.oss.bucket'), $object, $file->path());
        return $this->save($file, $info['oss-request-url']);
    }

    /**
     * 保存入库
     *
     * @param UploadedFile $file
     * @param string $path
     * @return Attachment
     */
    protected function save(UploadedFile $file, string $path): Attachment
    {
        $realFile = $file->getRealPath();
        return Attachment::create([
            'path' => $path,
            'user_id' => Auth::id(),
            'size' => filesize($realFile),
            'name' => $file->getClientOriginalName(),
            'extension' => $file->extension(),
        ]);
    }
}
