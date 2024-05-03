<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role === 'Admin';
    }
}
