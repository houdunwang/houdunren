<?php

namespace Modules\Edu\Services;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class LiveService
{
  /**
   * 生成推流地址
   * @param mixed $domain 直播域名如 live.houdunren.com
   * @param mixed $app 自定义应用名称
   * @param mixed $stream 自定义流名称
   * @param mixed|null $key URL鉴权中的主KEY，访问直播控制台中 域名管理>推流域名配置>访问控制 获取
   * @param int $expire 有效时间
   * @return string|string[]
   */
  public function pushUrl($domain, $app, $stream, $key = null, $expire = 1200)
  {
    //没有鉴权Key时
    if (is_null($key)) {
      return 'rtmp://' . $domain . '/' . $app . '/' . $stream;
    }
    $timeout = time() + $expire;
    $sstring = '/' . $app . '/' . $stream . '-' . $timeout . '-0-0-' . $key;
    $url = 'rtmp://' . $domain . '/' . $app . '/' . $stream . '?auth_key=' . $timeout . '-0-0-' . md5($sstring);
    $data = explode($stream, $url);
    return [
      'url' => trim($data[0], '/'),
      'key' => $stream . $data[1],
    ];
  }

  /**
   * 生成播流地址
   * @param mixed $domain 直播域名如 play.houdunren.com
   * @param mixed $app 自定义应用名称
   * @param mixed $stream 自定义流名称
   * @param mixed|null $key URL鉴权中的主KEY，访问直播控制台中 域名管理>播流域名配置>访问控制 获取
   * @param int $expire 有效时间
   * @return string|string[]
   */
  public function playUrl($domain, $app, $stream, $key = null, $expire = 1200)
  {
    //没有鉴权Key时
    if (is_null($key)) {
      $rtmp_play_url = 'rtmp://' . $domain . '/' . $app . '/' . $stream;
      $flv_play_url = 'http://' . $domain . '/' . $app . '/' . $stream . '.flv';
      $hls_play_url = 'http://' . $domain . '/' . $app . '/' . $stream . '.m3u8';
    } else {
      $timeStamp = time() + $expire;
      $rtmp_sstring = '/' . $app . '/' . $stream . '-' . $timeStamp . '-0-0-' . $key;
      $rtmp_md5hash = md5($rtmp_sstring);
      $rtmp_play_url = 'rtmp://' . $domain . '/' . $app . '/' . $stream . '?auth_key=' . $timeStamp . '-0-0-' . $rtmp_md5hash;

      $flv_sstring = '/' . $app . '/' . $stream . '.flv-' . $timeStamp . '-0-0-' . $key;
      $flv_md5hash = md5($flv_sstring);
      $flv_play_url = 'http://' . $domain . '/' . $app . '/' . $stream . '.flv?auth_key=' . $timeStamp . '-0-0-' . $flv_md5hash;

      $hls_sstring = '/' . $app . '/' . $stream . '.m3u8-' . $timeStamp . '-0-0-' . $key;
      $hls_md5hash = md5($hls_sstring);
      $hls_play_url = 'http://' . $domain . '/' . $app . '/' . $stream . '.m3u8?auth_key=' . $timeStamp . '-0-0-' . $hls_md5hash;
    }

    return [
      'rtmp' => $rtmp_play_url,
      'flv' => $flv_play_url,
      'hls' => $hls_play_url,
    ];
  }

  /**
   * 直播关闭时的阿里云向网站通知地址设置
   * 请先设置 accessKeyId 与 accessKeySecret
   * @return array|void
   * @throws ClientException
   */
  public function notify()
  {
    AlibabaCloud::accessKeyClient('<accessKeyId>', '<accessKeySecret>')
      ->regionId('cn-hangzhou')
      ->asDefaultClient();

    try {
      $result = AlibabaCloud::rpc()
        ->product('live')
        // ->scheme('https') // https | http
        ->version('2016-11-01')
        ->action('SetLiveStreamsNotifyUrlConfig')
        ->method('POST')
        ->host('live.aliyuncs.com')
        ->options([
          'query' => [
            'RegionId' => 'cn-hangzhou',
            'NotifyUrl' => 'http://houdunren.com/Edu/live/notify',
            'DomainName' => 'live.houdunren.com',
          ],
        ])
        ->request();
      return $result->toArray();
    } catch (ClientException $e) {
      echo $e->getErrorMessage() . PHP_EOL;
    } catch (ServerException $e) {
      echo $e->getErrorMessage() . PHP_EOL;
    }
  }
}
