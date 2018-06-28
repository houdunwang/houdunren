<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:57
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace App\Traits;

trait Message
{
    protected function success($message, $data = [], $code = 0)
    {
        return $this->getResponseMessage($message, $data, $code);
    }

    protected function error($message, $data = [], $code = 400)
    {
        return $this->getResponseMessage($message, $data, $code);
    }

    protected function getResponseMessage($message, $data, $code)
    {
        return response()->json( [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,
        ]);
    }
}
