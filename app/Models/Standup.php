<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Standup extends Model
{
    protected $fillable = ['yesterday_update', 'today_update'];

    /*
       set the elequent relationShip with the  User model
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
