<?php

namespace App\Policies;

use App\Incassation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncassationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any incassations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view incassations')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the incassation.
     *
     * @param  \App\User  $user
     * @param  \App\Incassation  $incassation
     * @return mixed
     */
    public function view(User $user, Incassation $incassation)
    {
        //
    }

    /**
     * Determine whether the user can create incassations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the incassation.
     *
     * @param  \App\User  $user
     * @param  \App\Incassation  $incassation
     * @return mixed
     */
    public function update(User $user, Incassation $incassation)
    {
        //
    }

    /**
     * Determine whether the user can delete the incassation.
     *
     * @param  \App\User  $user
     * @param  \App\Incassation  $incassation
     * @return mixed
     */
    public function delete(User $user, Incassation $incassation)
    {
        //
    }

    /**
     * Determine whether the user can restore the incassation.
     *
     * @param  \App\User  $user
     * @param  \App\Incassation  $incassation
     * @return mixed
     */
    public function restore(User $user, Incassation $incassation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the incassation.
     *
     * @param  \App\User  $user
     * @param  \App\Incassation  $incassation
     * @return mixed
     */
    public function forceDelete(User $user, Incassation $incassation)
    {
        //
    }

    public function report(User $user)
    {
        if ($user->hasPermissionTo('view incassation report')) {
            return true;
        } else {
            return false;
        }
    }
}
