<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Client extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['name','role_id','email', 'city', 'country', 'dob', 'phone', 'ccie', 'password'];

    public static function create(array $data)
    {
        // dd($data);
        $userEntry =  User::create([
            'name' => $data['name'],
            'role_id' => 2,
            'email' => $data['email'],
            'city' => $data['city'],
            'country' => $data['country'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

        $ccies = Ccie::find($data['ccie']);
        $userEntry->ccies()->attach($ccies);

        return;
        // $registerNewUser= new Bank_detail();
        // $registerNewUser->name=$data['name'];
        // $registerNewUser->email=$data['email'];
        // $registerNewUser->bcrypt($data['password']);
        // $registerNewUser->save();

    }
}
