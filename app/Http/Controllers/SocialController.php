<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Day;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function redirectToProvider($provider, Request $request)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        $socialiteUser = Socialite::driver($provider)->stateless()->user();

        $newUser = $this->AuthOrCreateUser($socialiteUser);

        // check if user has completed his registration data
        if (!$newUser->password) {
            $roles = Role::all();
            return view('auth/socialRegister')->with(['newUser' => $newUser, 'roles' => $roles]);
        }
        return redirect()->route('dashboard.moral.index', $newUser->id)->with('success', "You have logged in successfully");
    }



    private function getExistingUser($email)
    {
        return $existingUser = User::where('email', $email)->first();
    }



    // Authenticate the user if already exist.
    private function AuthOrCreateUser($userSocial)
    {
        $existingUser = $this->getExistingUser($userSocial->getEmail());
        if ($existingUser) {
            Auth::login($existingUser);
            return $existingUser;
        } else {
            $ProviderUserNameToArray = explode(" ", $userSocial->getName());  // convert the user name received from the socialite to array
            $fname = $ProviderUserNameToArray[0];                             // Set the first name to the first item in the array
            $lname = $ProviderUserNameToArray[1];                             // Set the last name to the second  item in the array
            $newUser = new User([
                'fname' =>  $fname,
                'lname' =>  $lname,
                'email' => $userSocial->getEmail(),
            ]);
            return $newUser;
        }
    }


    // complete the registration following the socialite user been authorized

    public function completeRegister(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $data = $request->all();
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $role = $request->input('role');
        $workingDays = [1, 2, 3, 4, 5, 6];

        $user->roles()->attach($role);
        $user->days()->sync($workingDays);
        $user->save();
        Auth::login($user);
        return redirect()->route('member.page', $user->id)->with('success', "You have logged in successfully, please update your working days.");
    }
}
