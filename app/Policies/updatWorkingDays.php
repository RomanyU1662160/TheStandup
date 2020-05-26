<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class updatWorkingDays
{
    use HandlesAuthorization;


    public function updateWorkingDays(User $user, User $member)
    {
        return  $user->id == $member->id;
    }

    public function accessDashBoard(User $user, User $member)
    {
        return  $user->id == $member->id;
    }
}
