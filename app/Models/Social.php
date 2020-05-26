<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['social_id', "name"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
