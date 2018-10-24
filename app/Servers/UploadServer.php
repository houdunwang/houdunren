<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Exceptions\UploadException;
use Houdunwang\LaravelUpload\Events\UploadEvent;

class UploadServer
{
    /**
     * 上传处理
     * @param $file object 文件
     * @param $type string 文件类型 image：图片 file：普通文件
     * @return mixed
     * @throws UploadException
     */
    public function upload($file, $type)
    {
        $this->check($file, $type);
        $event = new UploadEvent($file);
        event($event);
        return $event->getFile();
    }

    /**
     * 文件类型与大小检测
     * @param $file object 文件
     * @param $type string 文件类型 image：图片 file：普通文件
     * @throws UploadException
     */
    protected function check($file, $type)
    {
        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, explode(',', config_get('admin.upload.' . $type . '_type')))) {
            throw new UploadException('文件类型错误');
        }
        if ($file->getSize() > config_get('admin.upload.' . $type . '_size')) {
            throw new UploadException('文件过大不允许上传');
        }
    }

    /**
     * 上传BASE64图片
     * @param $content
     * @return string
     * @throws UploadException
     */
    public function uploadBase64Image($content)
    {
        //粘贴上传BASE64图片，如editor.md编辑器中的使用
        $imgdata = substr($content, strpos($content, ",") + 1);
        $allowSize = config_get('admin.upload.image_size');
        //上传大小检测
        if (strlen($content) > $allowSize) {
            throw new UploadException('上传失败，文件过大', 200);
        }
        $decodedData = base64_decode($imgdata);
        $dir = 'uploads/' . date('ym/d') . '/';
        is_dir($dir) or mkdir($dir, 0755, true);
        $fileName = $dir . str_random(10) . microtime(true) . '.jpeg';
        file_put_contents($fileName, $decodedData);
        return $fileName;
    }
}
