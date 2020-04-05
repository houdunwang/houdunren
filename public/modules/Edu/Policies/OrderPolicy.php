<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use Modules\Edu\Entities\Order;

class OrderPolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
  }

  public function delete(User $user, Order $order)
  {
    return $user['id'] == $order['user_id'];
  }
}
