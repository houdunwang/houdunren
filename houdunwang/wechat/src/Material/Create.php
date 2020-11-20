<?php

namespace Houdunwang\WeChat\Material;

use Http;

trait Create
{
  /**
   * 添加图片音频等其他类型永久素材
   */
  public function add(string $type, string $file)
  {
    $api = $this->api . '/material/add_material?access_token=' . $this->token() . '&type=' . $type;

    $response = Http::attach('media', file_get_contents($file), basename($file))
      ->post($api)
      ->json();

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

    $response = Http::post($api, $this->formatNews($data))->json();

    return $this->return($response);
  }

  /**
   * 格式化图文消
   * @param array $data
   * @return array
   */
  protected function formatNews(array $data)
  {
    $news = [];
    foreach ($data as $article) {
      if (empty($article['title']) || empty($article['picurl']) || empty($article['show_cover_pic']) || empty($article['content']) || empty($article['content_source_url'])) {
        continue;
      }

      $article['thumb_media_id'] = $this->add('image', $article['picurl'])['media_id'];
      $news[] = $article;
    }
    return ['articles' => $news];
  }
  /**
   * 上传图文素材内的图片
   */
  public function uploadNewsImage(string $file)
  {
    $api = $this->api . '/media/uploadimg?access_token=' . $this->token();

    $response = Http::attach('media', file_get_contents($file), basename($file))
      ->post($api)
      ->json();

    return $this->return($response);
  }
}
