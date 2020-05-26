<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use Laravel\Scout\Searchable;

class Team extends Model
{
    use Searchable;

    protected $fillable = ['name', 'about'];

    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['users'] = User::all();


        return $array;
    }
}
