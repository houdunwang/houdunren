<?php

namespace App\Listeners\Upload;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Base64上传
 * Class TextListener
 * @package App\Listeners\Upload
 */
class TextListener
{
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
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    /**
     * 上传BASE64图片
     * @param $content
     * @return string
     */
    public function uploadBase64Image($content)
    {
        //粘贴上传BASE64图片，如editor.md编辑器中的使用
        $imgData = substr($content, strpos($content, ",") + 1);
        $allowSize = config_get('admin.upload.image.size');
        //上传大小检测
        if (strlen($content) > $allowSize) {
            throw new UploadException('上传失败，文件过大', 200);
        }
        $decodedData = base64_decode($imgData);
        $dir = 'uploads/' . date('ym/d') . '/';
        is_dir($dir) or mkdir($dir, 0755, true);
        $fileName = $dir . str_random(10) . microtime(true) . '.jpeg';
        file_put_contents($fileName, $decodedData);
        return $fileName;
    }
}
