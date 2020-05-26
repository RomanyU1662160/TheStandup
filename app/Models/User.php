<?php

namespace App\Models;

use App\Models\Day;
use App\Models\Issue;
use App\Models\Morale;
use App\Models\Role;
use App\Models\Social;
use App\Models\Standup;
use App\Models\Team;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Searchable;
    use Notifiable;

    protected $fillable = [
        'fname', 'lname', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, "users_roles");
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function morales()
    {
        return $this->hasMany(Morale::class);
    }

    public function standups()
    {
        return $this->hasMany(Standup::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function getFullName()
    {
        $fullname = $this->fname . ' ' . $this->lname;
        return $fullname;
    }

    public function hasRole($role)
    {
        $role = Role::where('name', $role)->first();
        if ($role != null) {
            return Auth::user()->roles->contains($role->id);
        }
        return false;
    }

    public function getWorkingDays()
    {

        $days = $this->days;
        return view('days.index', compact('days'));
    }

    public function lastWorkingDay()
    {
        $lastWorkingDay = Carbon::yesterday();
        while (!$this->days->contains($lastWorkingDay->dayOfWeek)) {
            $lastWorkingDay = $lastWorkingDay->subDay();
        }

        return $lastWorkingDay;
    }

    public function nextWorkingDay()
    {
        $nextWorkingDay = Carbon::today();
        while (!$this->days->contains($nextWorkingDay->dayOfWeek)) {
            $nextWorkingDay->addDay();
        }

        return $nextWorkingDay;
    }

    /**
     * Get the indexable data array for the User model for Algolia.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['role'] = $this->roles;
        $array['team'] = $this->team;
        $array['days'] = $this->days;
        $array['standup'] = $this->standups;
        return $array;
    }


    public function getAvatar()
    {
        $hash = md5(trim($this->email));

        return "https://www.gravatar.com/avatar/${hash}?d=mm&s=400";
    }
}
