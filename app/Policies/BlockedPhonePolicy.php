<?php

namespace App\Policies;

use App\BlockedPhone;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BlockedPhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any blocked phones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view phones')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the blocked phone.
     *
     * @param  \App\User  $user
     * @param  \App\BlockedPhone  $blockedPhone
     * @return mixed
     */
    public function view(User $user, BlockedPhone $blockedPhone)
    {
        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }
        // admin overrides published status
        if ($user->can('view phone')) {
            return true;
        }
        // authors can view their own unpublished posts
        return false;
    }

    /**
     * Determine whether the user can create blocked phones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create phones')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the blocked phone.
     *
     * @param  \App\User  $user
     * @param  \App\BlockedPhone  $blockedPhone
     * @return mixed
     */
    public function update(User $user, BlockedPhone $blockedPhone)
    {
        if ($user->can('edit phones')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the blocked phone.
     *
     * @param  \App\User  $user
     * @param  \App\BlockedPhone  $blockedPhone
     * @return mixed
     */
    public function delete(User $user, BlockedPhone $blockedPhone)
    {
        if ($user->can('delete phones')) {
            return true;
        }
    }
}
