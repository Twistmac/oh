<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Syndics extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'email', 'password', 'salt'
    ];

    protected $hidden = [
        'password', 'remember_token', 'salt'
    ];

    public function saveSyndic($data)
    {
        $this->id = null;
        $this->email = $data['email'];
        $this->password = Hash::make($data['password']);
        $this->salt = base64_encode($data['password']);
        $this->save();
        return true;
    }
}
