<?php

namespace App\Policies;

use App\User;
use App\Terminal;
use Illuminate\Auth\Access\HandlesAuthorization;

class TerminalPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any terminals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view terminals')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the terminal.
     *
     * @param  \App\User  $user
     * @param  \App\Terminal  $terminal
     * @return mixed
     */
    public function view(User $user, Terminal $terminal)
    {
        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }
        // admin overrides published status
        if ($user->can('view terminal')) {
            return true;
        }
        // authors can view their own unpublished posts
        return false;
    }

    /**
     * Determine whether the user can create terminals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create terminals')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the terminal.
     *
     * @param  \App\User  $user
     * @param  \App\Terminal  $terminal
     * @return mixed
     */
    public function update(User $user, Terminal $terminal)
    {
        if ($user->can('edit terminals')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the terminal.
     *
     * @param  \App\User  $user
     * @param  \App\Terminal  $terminal
     * @return mixed
     */
    public function delete(User $user, Terminal $terminal)
    {
        if ($user->can('delete terminals')) {
            return true;
        } else {
            return false;
        }

    }

    public function terminals(User $user)
    {
        if ($user->hasPermissionTo('view terminals report')) {
            return true;
        } else {
            return false;
        }
    }
}
