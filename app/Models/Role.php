<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillale = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, "users_roles");
    }
}
