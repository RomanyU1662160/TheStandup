<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessDashboard
{
    use HandlesAuthorization;

    public function accessDashBoard(User $user, User $member)
    {
        return  $user->id == $member->id;
    }
}
