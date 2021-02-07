<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Client extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['name','role_id','email', 'city', 'country', 'dob', 'phone', 'password'];

    public static function create(array $data)
    {
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'role_id' => 2,
            'email' => $data['email'],
            'city' => $data['city'],
            'country' => $data['country'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        // $registerNewUser= new Bank_detail();
        // $registerNewUser->name=$data['name'];
        // $registerNewUser->email=$data['email'];
        // $registerNewUser->bcrypt($data['password']);
        // $registerNewUser->save();

    }
}
