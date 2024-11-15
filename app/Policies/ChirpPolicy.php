<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;

class ChirpPolicy
{
    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }

    public function destroy(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }
}