<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Ccie extends Model
{
    //
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
