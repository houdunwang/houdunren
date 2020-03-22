<?php

namespace Modules\Edu\Observers;

use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\SignTotal;

/**
 * 签到观察器
 * @package Modules\Edu\Observers
 */
class SignObserver
{
  public function created(Sign $sign)
  {
    $data = [];
    $data['total'] = Sign::where('user_id', $sign['user_id'])->count();
    $data['month'] = Sign::where('user_id', $sign['user_id'])->whereMonth('created_at', now())->count();
    SignTotal::updateOrCreate(['user_id' => Auth::id(), 'site_id' => SITEID], $data);
  }
}
