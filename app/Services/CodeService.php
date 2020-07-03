<?php

namespace App\Services;

use Cache;

class CodeService
{
    protected $mobile;
    protected $code;

    public function send(string $mobile)
    {
        $this->code = mt_rand(1000, 9999);
        Cache::put($this->key($mobile), $this->code, now()->addMinute(30));
        $this->mobile($mobile);
    }

    protected function key($mobile)
    {
        return md5('verification-code-' . $mobile);
    }


    public function mobile($mobile)
    {
    }

    public function check($mobile, $value)
    {
        return Cache::get($this->key($mobile)) == $value;
    }
}
