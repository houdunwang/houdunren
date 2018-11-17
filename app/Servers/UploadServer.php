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
use Spatie\Image\Image;

class UploadServer
{
    /**
     * 上传处理
     * @param $file
     * @return string
     * @throws UploadException
     * @throws \Houdunwang\Uploader\Exceptions\InvalidParamException
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function upload($file)
    {
        $type = $this->isImage($file) ? 'image' : 'file';
        $this->check($file, $type);
        $uploadFile = $this->save($file);
        if ($type == 'image') {
            $info = getimagesize($uploadFile);
            if ($info[0] > config_get('admin.upload.image.width') || $info[1] > config_get('admin.upload.image.height')) {
                Image::load($uploadFile)->width(config_get('admin.upload.image.width'))
                    ->height(config_get('admin.upload.image.height'))->save($uploadFile);
            }
        }
        if (config_get('admin.upload.driver') == 'oss') {
            $uploadFile = \Uploader::config(config_get('admin.upload'))->upload($uploadFile);
            @unlink($uploadFile);
        }
        return $uploadFile;
    }

    protected function save($file)
    {
        $dir = 'attachments/' . date('Y/m');
        $filename = $this->filename($file);
        $file->move($dir, $filename);
        return $dir . '/' . $filename;
    }

    protected function filename($file)
    {
        return auth()->id() . time() . mt_rand(1, 999) . '.' . $file->getClientOriginalExtension();
    }

    /**
     * 图片检测
     * @param $file
     * @return bool
     */
    protected function isImage($file)
    {
        $ext = $file->getClientOriginalExtension();
        return in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']);
    }

    /**
     * 文件类型与大小检测
     * @param $file object 文件
     * @param $type string 文件类型 image：图片 file：普通文件
     * @throws UploadException
     * @return bool
     */
    protected function check($file, $type): bool
    {
        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, explode(',', config_get('admin.upload.' . $type . '.type')))) {
            throw new UploadException('文件类型错误');
        }
        if ($file->getSize() > config_get('admin.upload.' . $type . '.size')) {
            throw new UploadException('文件过大不允许上传');
        }
        return true;
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
        $imgData = substr($content, strpos($content, ",") + 1);
        $allowSize = config_get('admin.upload.image_size');
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
