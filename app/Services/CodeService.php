<?php

namespace App\Services;

use AlibabaCloud\Client\Exception\ClientException;
use Exception;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;

/**
 * 验证码服务
 * @package App\Services
 */
class CodeService
{
  protected $name = 'validate_code';
  protected $timeout = 120;
  public function __construct()
  {
    // Cache::forget($this->name);
  }
  /**
   * 发送验证码
   * @param string $type 类型 sms|email
   * @param string $account 发送手机号或邮箱
   * @return void
   * @throws Exception
   */
  public function send(string $type, string $account)
  {
    $diffSecond = $this->diffInSeconds();
    if ($diffSecond < $this->timeout) {
      $seconds = $this->timeout - $diffSecond;
      throw new Exception("请等待 {$seconds} 秒后操作");
    }
    $this->$type($account);
  }

  /**
   * 验证验证码
   * @param int $code 验证码
   * @return bool
   */
  public function check(string $code)
  {
    return $this->getCache()['code'] == $code;
  }

  /**
   * 距上次发送时间间隔
   * @return int
   * @throws InvalidArgumentException
   */
  protected function diffInSeconds()
  {
    return now()->diffInSeconds($this->getCache()['time']);
  }

  /**
   * 获取缓存数据
   * @return mixed
   */
  protected function getCache()
  {
    return Cache::get($this->name, ['code' => '@', 'time' => now()->subMinute(10)]);
  }

  /**
   * 缓存验证码
   * @return int 验证码
   */
  protected function putCache()
  {
    $code = mt_rand(1000, 9999);
    Cache::put($this->name, ['code' => $code, 'time' => now()], now()->addMinute(30));
    return $code;
  }
  /**
   * 短信验证码
   * @param mixed $account
   * @return void
   * @throws ClientException
   * @throws Exception
   */
  protected function sms($account)
  {
    $webname = site()['name'];
    return (new SmsService)->send([
      'PhoneNumbers' => $account,
      'TemplateCode' => config('site.sms.aliyun.template.value'),
      'TemplateParam' => ['code' => $this->putCache(), 'product' => "《${webname}》"],
    ]);
  }

  /**
   * 邮件验证码
   * @param mixed $account
   * @return void
   */
  protected function email($account)
  {
    $user = auth()->user();
    $user->email = $account;
    $message = [
      'subject' => '验证码',
      // 'greeting' => 'Hi',
      'content' => '验证码' . $this->putCache() . '，有效期30分钟。',
      'salutation' => 'Copyright © ' . config('app.name'),
    ];
    return (new MailService)->send($user, $message);
  }
}
