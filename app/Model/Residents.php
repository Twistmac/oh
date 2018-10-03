<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Residents extends Model
{
    protected $table = 'membres';

    protected $fillable = [
        'email', 'password','salt', 'nom', 'prenom', 'birthday', 'sex', 'pseudo', 'username',
        'phone', 'username', 'complete', 'role', 'residence_id', 'syndic_id','etat'
    ];

    protected $hidden = [
        'password', 'remember_token', 'salt'
    ];

    public function saveResident($data)
    {
        $this->id = null;
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = Hash::make($data['password']);
        $this->salt = base64_encode($data['password']);
        $this->residence_id = $data['residence_id'];
        $this->role = $data['role'];
        $this->syndic_id = $data['syndic_id'];
        $this->save();
        return true;
    }
}
