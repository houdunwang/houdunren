<?php

namespace App\Services;

use App\Notifications\VerificationCodeNotification;
use App\User;
use Cache;
use Exception;

class CodeService
{
    protected $account;
    protected $code;

    public function send(string $account)
    {
        $this->code = mt_rand(1000, 9999);
        Cache::put($this->key($account), $this->code, now()->addMinute(30));
        call_user_func([$this, $this->action($account)], $account);
    }

    protected function key($account)
    {
        return md5('verification-code-' . $account);
    }

    protected function action($account)
    {
        return filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    public function email($account)
    {
        $user = app(User::class)->fill(['email' => $account]);

        $user->notify(new VerificationCodeNotification($this->code));
    }

    public function check($account, $value)
    {
        return Cache::get($this->key($account)) == $value;
    }
}
