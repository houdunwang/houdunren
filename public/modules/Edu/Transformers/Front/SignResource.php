<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\SignTotal;

class SignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $sign =  parent::toArray($request);
        $sign['user'] = $this->user;
        $sign['total'] = SignTotal::where('user_id', $this->user_id)->where('site_id', SITEID)->first();
        return $sign;
    }

    /**
     * 今日签到检测
     * @return bool
     */
    protected function signCheck()
    {
        return (bool) Sign::where('user_id', Auth::id())->whereDate('created_at', now())->first();
    }
}
