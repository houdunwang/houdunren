<?php

namespace Houdunwang\WeChat\Material;

use Exception;
use Http;

/**
 * 上传素材
 */
trait Upload
{
    /**
     * 添加素材
     * 图片（image）、语音（voice）、视频（video）和缩略图（thumb）
     * @param string $type 素材类型
     * @param string $file 文件
     * @param string $uploadType short临时素材，long永久素材
     * @return mixed
     * @throws Exception
     */
    public function add(string $type, string $file, string $uploadType)
    {
        //临时或永久素材上传地址
        $url = $uploadType == 'short' ? 'media/upload' : 'material/add_material';
        $api = $this->api . "/{$url}?access_token=" . $this->token() . "&type=" . $type;
        $response = Http::attach('media', file_get_contents($file), basename($file))->post($api)->json();
        return $this->return($response);
    }

    /**
     * 新增永久图文素材
     * @param array $data
     * @return mixed
     */
    public function addNews(array $data)
    {
        $api = $this->api . '/material/add_news?access_token=' . $this->token();
        $response = Http::post($api, ['articles' => $data])->json();
        return $this->return($response);
    }

    /**
     * 上传图文素材内的图片
     * @param string $file
     * @return mixed
     * @throws Exception
     */
    public function uploadNewsImage(string $file)
    {
        $api = $this->api . '/media/uploadimg?access_token=' . $this->token();
        $response = Http::attach('media', file_get_contents($file), basename($file))->post($api)->json();
        return $this->return($response);
    }
}
