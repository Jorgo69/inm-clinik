<?php

namespace App\Policies;

use App\Models\User;

class AdminSystemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(User $user)
    {
        $this-> $user->role === 'admin...system' ;
    }
}
