<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Client extends Model
{
    //

    public static function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role_id' => 2,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        // $registerNewUser= new Bank_detail();
        // $registerNewUser->name=$data['name'];
        // $registerNewUser->email=$data['email'];
        // $registerNewUser->bcrypt($data['password']);
        // $registerNewUser->save();

    }
}
