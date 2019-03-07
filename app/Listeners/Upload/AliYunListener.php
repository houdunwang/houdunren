<?php

namespace App\Listeners\Upload;

use App\Exceptions\UploadException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use OSS\OssClient;

class AliYunListener
{
    protected $event;

    /**
     * OSS服务
     * @return OssClient
     * @throws \OSS\Core\OssException
     */
    public function getHttpClient()
    {
        return new OssClient(
            $this->event->config('aliyun.accessKeyId'),
            $this->event->config('aliyun.accessKeySecret'),
            $this->event->config('aliyun.endpoint')
        );
    }

    public function handle($event)
    {
        $this->event = $event;
        if ($this->event->config('upload.type') == 'aliyun') {
            try {
                $fileName = auth()->id() . time() . '.' . $this->event->file->getClientOriginalExtension();
                $res = $this->getHttpClient()->uploadFile(
                    $this->event->config('aliyun.bucket'),
                    $fileName,
                    $event->file->getRealPath()
                );
                $this->event->create($res['oss-request-url']);
                return false;
            } catch (\Exception $e) {
                throw new UploadException($e->getMessage(), $e->getCode(), $e);
            }
        }
    }
}
