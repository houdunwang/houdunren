<?php

namespace App\Services;

use Auth;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use OSS\Core\OssException;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

/**
 * 文件上传
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
        $path = $file->store(date('Ym'), 'attachment');

        return $this->save($file, "attachments/{$path}");
    }

    /**
     * 云上传
     *
     * @param UploadedFile $file
     * @return void
     */
    public function make(UploadedFile $file)
    {
        $object = user('id') . '-' . date('Ymdhis') . '.' . $file->extension();
        try {
            $ossClient = new OssClient(config('site.aliyun.accessKeyId'), config('site.aliyun.accessKeySecret'), config('site.aliyun.oss.endpoint'));

            $info = $ossClient->uploadFile(config('site.aliyun.oss.bucket'), $object, $file->path());
            return $this->save($file, $info['oss-request-url']);
        } catch (OssException $e) {
            abort(400, 'OSS 配置错误');
        }
    }

    /**
     * 保存入库
     *
     * @param UploadedFile $file
     * @param string $path
     * @return void
     */
    protected function save(UploadedFile $file, string $path)
    {
        return Attachment::create([
            'path' => $path,
            'user_id' => Auth::id(),
            'name' => $file->getClientOriginalName(),
            'extension' => $file->extension(),
        ]);
    }
}
