<?php

namespace Modules\Edu\Services;

use Modules\Edu\Entities\Subscribe;

/**
 * 服务套餐
 * Class SubscribeService
 */
class SubscribeService
{
  public function get()
  {
    return Subscribe::get();
  }
}
