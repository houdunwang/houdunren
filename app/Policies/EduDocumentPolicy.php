<?php

namespace App\Policies;

use App\User;
use App\Models\EduDocument;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edu document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduDocument  $eduDocument
     * @return mixed
     */
    public function view(User $user, EduDocument $eduDocument)
    {
        //
    }

    /**
     * Determine whether the user can create edu documents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }
	public function flag(User $user, EduDocument $document)
	{
		return $user->can('Edu-document');
	}
    /**
     * Determine whether the user can update the edu document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduDocument  $eduDocument
     * @return mixed
     */
    public function update(User $user, EduDocument $document)
    {

		return $user->id == $document->user_id || $user->can('Edu-document');
    }

    /**
     * Determine whether the user can delete the edu document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduDocument  $eduDocument
     * @return mixed
     */
    public function delete(User $user, EduDocument $document)
    {
		return $user->id == $document->user_id || $user->can('Edu-document');
    }

    /**
     * Determine whether the user can restore the edu document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduDocument  $eduDocument
     * @return mixed
     */
    public function restore(User $user, EduDocument $eduDocument)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduDocument  $eduDocument
     * @return mixed
     */
    public function forceDelete(User $user, EduDocument $eduDocument)
    {
        //
    }
}
