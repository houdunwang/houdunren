<?php

namespace App\Listeners\Upload;

use App\Exceptions\UploadException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use OSS\OssClient;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * Base64上传
 * Class TextListener
 * @package App\Listeners\Upload
 */
class TextListener
{
    protected $event;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $event
     * @return bool
     * @throws UploadException
     * @throws \OSS\Core\OssException
     */
    public function handle($event)
    {
        $this->event = $event;
        $content = request()->input('file');
        if (is_string($content)) {
            //粘贴上传BASE64图片，如editor.md编辑器中的使用
            $imgData = substr($content, strpos($content, ",") + 1);
            $allowSize = $this->event->config('upload.image_size');
            //上传大小检测
//            if (strlen($content) > $allowSize) {
//                throw new UploadException('文件过大不允许上传', 200);
//            }
            $decodedData = base64_decode($imgData);
            $path = $this->save($decodedData);
            $event->create($path);
            return false;
        }
    }

    /**
     * 保存文件
     * @param $content
     * @throws \OSS\Core\OssException
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function save($content)
    {
        $file = 'attachments/' . date('Y/m') . '/' . auth()->id() . time() . '.jpeg';
        file_put_contents($file, $content);
        Image::load($file)->fit(Manipulations::FIT_MAX, 1000, 1000)->save();
        if ($this->event->config('upload.type') == 'local') {
            $this->event->create('/' . $file);
        } else {
            $client = new OssClient(
                $this->event->config('aliyun.accessKeyId'),
                $this->event->config('aliyun.accessKeySecret'),
                $this->event->config('aliyun.endpoint')
            );
            $res = $client->uploadFile(
                $this->event->config('aliyun.bucket'),
                date('Y/m') . '/' . auth()->id() . time() . '.jpeg',
                $file
            );
            @unlink($file);
            $this->event->create($res['oss-request-url']);
        }
    }
}
