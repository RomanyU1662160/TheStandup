<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use Searchable;


    private $active = null;

    protected $fillable = [
        'name', 'start_date', 'end_date', 'about'
    ];

    protected $dates = ['start_date', 'end_date',];

    /*
            set the elequent relationShip with the User model
            to get all members working on a project
    */
    public function members()
    {
        return $this->hasManyThrough(User::class, Team::class);
    }


    /*
            set the elequent relationShip with the Team model
    */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    // Check if the project is actrive and return bollean
    public  function isActive()
    {
        $start = $this->start_date;
        $end = $this->end_date;
        // $start = Carbon::create($this->start_date);
        // $end = Carbon::create($this->end_date);
        $today = Carbon::today();
        return $this->active =  $today->isBetween($start, $end);
    }
}
