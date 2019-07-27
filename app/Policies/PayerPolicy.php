<?php

namespace App\Policies;

use App\User;
use App\Payer;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayerPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any payers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view payers')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the payer.
     *
     * @param  \App\User  $user
     * @param  \App\Payer  $payer
     * @return mixed
     */
    public function view(User $user, Payer $payer)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view payer')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create payers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the payer.
     *
     * @param  \App\User  $user
     * @param  \App\Payer  $payer
     * @return mixed
     */
    public function update(User $user, Payer $payer)
    {
        //
    }

    /**
     * Determine whether the user can delete the payer.
     *
     * @param  \App\User  $user
     * @param  \App\Payer  $payer
     * @return mixed
     */
    public function delete(User $user, Payer $payer)
    {
        //
    }

    /**
     * Determine whether the user can restore the payer.
     *
     * @param  \App\User  $user
     * @param  \App\Payer  $payer
     * @return mixed
     */
    public function restore(User $user, Payer $payer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the payer.
     *
     * @param  \App\User  $user
     * @param  \App\Payer  $payer
     * @return mixed
     */
    public function forceDelete(User $user, Payer $payer)
    {
        //
    }
}
