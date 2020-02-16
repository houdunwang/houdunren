<?php

namespace App\Policies;

use App\Models\Module;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
  use HandlesAuthorization;

  public function before(User $user, $ability)
  {
    return (bool)$user->is_super_admin;
  }

  public function viewAny(User $user)
  {
  }

  public function view(User $user, Module $module)
  {
  }

  public function create(User $user)
  {
  }

  /**
   * Determine whether the user can update the module.
   *
   * @param \App\User $user
   * @param \App\Models\Module $module
   * @return mixed
   */
  public function update(User $user, Module $module)
  {
    //
  }

  public function delete(User $user, Module $module)
  {
    //
  }

  /**
   * Determine whether the user can restore the module.
   *
   * @param \App\User $user
   * @param \App\Models\Module $module
   * @return mixed
   */
  public function restore(User $user, Module $module)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the module.
   *
   * @param \App\User $user
   * @param \App\Models\Module $module
   * @return mixed
   */
  public function forceDelete(User $user, Module $module)
  {
    //
  }
}
