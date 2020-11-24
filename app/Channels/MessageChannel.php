<?php

namespace App\Channels;

use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;

class MessageChannel extends DatabaseChannel
{
  public function send($notifiable, Notification $notification)
  {
    $data = $notification->toArray($notifiable);

    if (!empty($data['title'])) {
      $notifiable->routeNotificationFor('database', $notification)->create(
        $this->buildPayload($notifiable, $notification)
      );
    }
  }

  protected function buildPayload($notifiable, Notification $notification)
  {
    return [
      'id' => $notification->id,
      'site_id' => site()['id'],
      'module_id' => module()['id'],
      'type' => get_class($notification),
      'data' => $this->getData($notifiable, $notification),
      'read_at' => null,
    ];
  }
}
