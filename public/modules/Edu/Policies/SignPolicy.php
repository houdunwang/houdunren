<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use Modules\Edu\Entities\Sign;

class SignPolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
  }

  public function delete(User $user, Sign $sign)
  {
    return $user['id'] === $sign->user_id;
  }
}
