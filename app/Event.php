<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Rack;
use App\Ccie;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = ['title','start_date','end_date'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function racks()
    {
        return $this->belongsTo(Rack::class, 'rack_id', 'id');
    }

    public function ccie()
    {
        return $this->belongsTo(Ccie::class);
    }
}
