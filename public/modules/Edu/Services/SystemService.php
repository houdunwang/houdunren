<?php

namespace Modules\Edu\Services;

use Modules\Edu\Entities\System;

/**
 * 系统课程服务
 * Class SystemService
 */
class SystemService
{
  /**
   * 获取分页课程列表
   * @param integer $row
   *
   * @return void
   */
  public function get(int $row = 10)
  {
    return System::where('site_id', site()['id'])->latest()->paginate($row);
  }
}
