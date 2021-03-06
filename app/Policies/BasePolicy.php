<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class BasePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user) { // update later for next version
            return true;
        }
    }
}
