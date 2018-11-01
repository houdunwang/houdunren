<?php

namespace App\Policies;

use App\User;
use App\Models\EduChapter;
use Illuminate\Auth\Access\HandlesAuthorization;

class EduChapterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the edu chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduChapter  $eduChapter
     * @return mixed
     */
    public function view(User $user, EduChapter $eduChapter)
    {
        //
    }

    /**
     * Determine whether the user can create edu chapters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the edu chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduChapter  $eduChapter
     * @return mixed
     */
    public function update(User $user, EduChapter $chapter)
    {

		return $user->id == $chapter->document->user_id || $user->can('Edu-document');
    }

    /**
     * Determine whether the user can delete the edu chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduChapter  $eduChapter
     * @return mixed
     */
    public function delete(User $user, EduChapter $chapter)
    {
		return $user->id == $chapter->document->user_id || $user->can('Edu-document');
	}

    /**
     * Determine whether the user can restore the edu chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduChapter  $eduChapter
     * @return mixed
     */
    public function restore(User $user, EduChapter $chapter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the edu chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EduChapter  $eduChapter
     * @return mixed
     */
    public function forceDelete(User $user, EduChapter $chapter)
    {
        //
    }
}
