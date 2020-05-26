<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Role;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectTo = '/home';

    public function getRegister()
    {
        $workingDays = Day::all();
        $roles =  Role::all();

        return view('auth.register', compact('roles', 'workingDays'));
    }
}
