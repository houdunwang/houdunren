<?php

namespace App\Listeners\Upload;

use App\Exceptions\UploadException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use OSS\OssClient;

class OssListener
{
    protected $config;
    protected $event;

    public function __construct()
    {
        $this->config = config_get('aliyun', [], 'system');
    }

    /**
     * OSS服务
     * @return OssClient
     * @throws \OSS\Core\OssException
     */
    public function getHttpClient()
    {
        return new OssClient($this->config['accessKeyId'], $this->config['accessKeySecret'], $this->config['endpoint']);
    }

    public function handle($event)
    {
        $this->event = $event;
        if (config_get('upload.way', 'local', 'system') == 'oss') {
            try {
                $fileName = auth()->id() . time() . '.' . $this->event->file->getClientOriginalExtension();
                $res = $this->getHttpClient()->uploadFile(
                    $this->config['bucket'], $fileName,
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
