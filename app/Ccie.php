<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\User;

class Ccie extends Model
{
    //
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
