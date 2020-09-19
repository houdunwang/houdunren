<?php

namespace App\Http\Controllers\WeChatApi;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat;
use App\Http\Controllers\WeChatApi\Message\Text;
use App\Http\Controllers\WeChatApi\Message\Event;
use App;
use App\Services\WeChatService;
use Houdunwang\WeChat\User;
use Log;

class ApiController extends Controller
{
  protected $processes = [Text::class, Event::class];
  protected $message;
  protected $model;

  public function handle(WeChat $model, Message $message)
  {
    $this->message = $message;
    $this->model = $model;
    $message->init($model);
    $this->login();
    foreach ($this->processes as $processor) {
      if ($content = App::call([new $processor(), 'handle'], ['model' => $model, 'message' => $message])) {
        return $content;
      }
    }
  }

  protected function login()
  {
    $account = app(User::class)->get($this->message->message->FromUserName);
    $account['wechat_id'] = $this->model->id;
    $account['type'] = 'wechat';

    app(WeChatService::class)->login($account, 'wechat');
  }
}
