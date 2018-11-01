<?php

namespace App\Policies;

use App\User;
use App\Models\EduSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduSectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edu section.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSection  $eduSection
     * @return mixed
     */
    public function view(User $user, EduSection $section)
    {
        //
    }

    /**
     * Determine whether the user can create edu sections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edu section.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSection  $eduSection
     * @return mixed
     */
    public function update(User $user, EduSection $section)
    {
		return $user->id == $section->chapter->document->user_id || $user->can('Edu-document');
	}

    /**
     * Determine whether the user can delete the edu section.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSection  $eduSection
     * @return mixed
     */
    public function delete(User $user, EduSection $section)
    {
		return $user->id == $section->chapter->document->user_id || $user->can('Edu-document');
    }

    /**
     * Determine whether the user can restore the edu section.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSection  $eduSection
     * @return mixed
     */
    public function restore(User $user, EduSection $section)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu section.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduSection  $eduSection
     * @return mixed
     */
    public function forceDelete(User $user, EduSection $section)
    {
        //
    }
}
