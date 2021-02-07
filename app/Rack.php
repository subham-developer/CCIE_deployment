<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Rack extends Model
{
    //
    public function events()
    {
        return $this->hasMany(Event::class, 'rack_id', 'id');
    }
}
