<?php

namespace App\Policies;

use App\User;
use App\Payment;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any payments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view payments')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function view(User $user, Payment $payment)
    {
        if ($user === null) {
            return false;
        }
        if ($user->can('view payment')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create payments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function update(User $user, Payment $payment)
    {
        //
    }

    /**
     * Determine whether the user can delete the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function delete(User $user, Payment $payment)
    {
        //
    }

    /**
     * Determine whether the user can restore the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function restore(User $user, Payment $payment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function forceDelete(User $user, Payment $payment)
    {
        //
    }

    public function report(User $user)
    {
        if ($user->hasPermissionTo('view payments report')) {
            return true;
        } else {
            return false;
        }
    }
}
