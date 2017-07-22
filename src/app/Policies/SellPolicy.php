<?php

namespace App\Policies;

use App\User;
use App\Sell;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sell.
     *
     * @param  \App\User  $user
     * @param  \App\Sell  $sell
     * @return mixed
     */
    public function view(User $user, Sell $sell)
    {
        
    }

    /**
     * Determine whether the user can create sells.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the sell.
     *
     * @param  \App\User  $user
     * @param  \App\Sell  $sell
     * @return mixed
     */
    public function update(User $user, Sell $sell)
    {
        return $user->id == $sell->user_id;
    }

    /**
     * Determine whether the user can delete the sell.
     *
     * @param  \App\User  $user
     * @param  \App\Sell  $sell
     * @return mixed
     */
    public function delete(User $user, Sell $sell)
    {
        //
    }
}
