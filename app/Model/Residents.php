<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Residents extends Model
{
    protected $table = 'membres';

    protected $fillable = [
        'id', 'email', 'password', 'nom', 'prenom', 'birthday', 'sex', 'pseudo', 'username', 'phone', 'username', 'complete', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token', 'salt'
    ];

    public function saveResident($data)
    {
        $this->id = null;
        $this->username = $data['username'];
        $this->password = Hash::make($data['password']);
        $this->salt = base64_encode($data['password']);
        $this->residence_id = $data['residence_id'];
        $this->role = $data['role'];
        $this->save();
        return true;
    }
}
