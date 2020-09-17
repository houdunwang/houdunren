<?php

namespace App\Http\Controllers\WeChatApi;

use App\Http\Controllers\Controller;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;
use App\Models\WeChat;
use App\Http\Controllers\WeChatApi\Message\Text;
use App\Http\Controllers\WeChatApi\Message\Event;
use App;
use Log;

class ApiController extends Controller
{
  protected $processes = [Text::class, Event::class];

  public function handle(WeChat $model, Message $message)
  {
    $message->init($model);

    foreach ($this->processes as $processor) {
      if ($content = App::call([new $processor(), 'handle'], ['model' => $model, 'message' => $message])) {
        return $content;
      }
    }
  }
}
