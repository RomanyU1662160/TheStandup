<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['title', 'status', 'solved_by'];

    /*
    set the elequent relationShip with the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSolved($query)
    {
        return $query->where('status', 1);
    }
}