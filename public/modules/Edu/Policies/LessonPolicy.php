<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
  }
  public function create(User $user)
  {
  }
}
