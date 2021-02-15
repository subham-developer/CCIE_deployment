<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Event;
use App\Ccie;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'city', 'country', 'dob', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    public function roles()
    {
        return $this->hasOne(Role::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function ccies()
    {
        return $this->belongsToMany(Ccie::class);
    }
}
