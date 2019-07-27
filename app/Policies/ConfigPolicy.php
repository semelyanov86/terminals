<?php

namespace App\Policies;

use App\Terminal;
use App\Config;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any configs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view configs')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the config.
     *
     * @param  \App\User  $user
     * @param  \App\Config  $config
     * @return mixed
     */
    public function view(User $user, Config $config)
    {
        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }
        // admin overrides published status
        if ($user->can('view config')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create configs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create configs')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the config.
     *
     * @param  \App\User  $user
     * @param  \App\Config  $config
     * @return mixed
     */
    public function update(User $user, Config $config)
    {
        if ($user->can('edit configs')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the config.
     *
     * @param  \App\User  $user
     * @param  \App\Config  $config
     * @return mixed
     */
    public function delete(User $user, Config $config)
    {
        if ($user->can('delete configs')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the config.
     *
     * @param  \App\User  $user
     * @param  \App\Config  $config
     * @return mixed
     */
    public function restore(User $user, Config $config)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the config.
     *
     * @param  \App\User  $user
     * @param  \App\Config  $config
     * @return mixed
     */
    public function forceDelete(User $user, Config $config)
    {
        //
    }

    public function activate(Terminal $terminal, Config $config)
    {
        if ($terminal->active) {
            return true;
        } else {
            return false;
        }
    }
}
