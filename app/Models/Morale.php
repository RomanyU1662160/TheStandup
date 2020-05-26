<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Morale extends Model
{

    protected $fillable = ['value'];

    /*
       set the elequent relationShip with the  User model
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
