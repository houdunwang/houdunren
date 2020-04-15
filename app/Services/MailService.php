<?php

namespace App\Services;

use App\Notifications\MailNotification;
use App\User;
use Illuminate\Support\Facades\Notification;

/**
 * 邮件服务
 * @package App\Services
 */
class MailService
{
    /**
     * 发送验证码
     * @param string $email
     * @return void
     */
    public function code(string $email)
    {
        $user = new User();
        $user->email = $email;
        $message = [
            'greeting' => 'Hi',
            'subject' => '验证码',
            'content' => '验证码' . rand(1000, 9999) . '，请在页面中输入以完成验证',
            'salutation' => 'Copyright © ' . config('app.name'),
        ];
        return $this->send($user, $message);
    }

    /**
     * 发送邮件
     * @param User $user
     * @param array $message
     * @return void
     */
    public function send(User $user, array $message)
    {
        return Notification::send($user, new MailNotification($message));
    }
}
