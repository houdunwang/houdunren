<?php

namespace App\Policies;

use App\Models\Package;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

/**
 * 套餐
 * Class PackagePolicy
 * @package App\Policies
 */
class PackagePolicy
{
  use HandlesAuthorization;

  public function before(User $user): bool
  {
    return (bool)$user['is_super_admin'];
  }

  public function viewAny(User $user)
  {
  }

  public function view(User $user, Package $package)
  {
  }

  public function create(User $user)
  {
  }

  public function update(User $user, Package $package)
  {
  }

  public function delete(User $user, Package $package)
  {
  }

  /**
   * Determine whether the user can restore the package.
   *
   * @param \App\User $user
   * @param \App\Models\Package $package
   * @return mixed
   */
  public function restore(User $user, Package $package)
  {
  }

  /**
   * Determine whether the user can permanently delete the package.
   *
   * @param \App\User $user
   * @param \App\Models\Package $package
   * @return mixed
   */
  public function forceDelete(User $user, Package $package)
  {
    //
  }
}
