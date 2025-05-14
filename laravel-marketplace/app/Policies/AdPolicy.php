<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;

class AdPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Ad $ad): bool
    {
        return $user->id === $ad->user_id;
    }

    public function update(User $user, Ad $ad): bool
    {
        return $user->id === $ad->user_id;
    }

    public function delete(User $user, Ad $ad): bool
    {
        return $user->id === $ad->user_id;
    }
}
