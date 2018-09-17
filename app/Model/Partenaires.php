<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partenaires extends Authenticatable
{
    use Notifiable;
    protected $table = 'membres';

    protected $fillable = [
        'email', 'password', 'nom', 'prenom', 'birthday', 'sex', 'pseudo', 'phone', 'username', 'complete'
    ];

    protected $hidden = [
        'password', 'remember_token', 'salt'
    ];

    public function savePartenaire($data)
    {
        $this->id = null;
        $this->username = $data['username'];
        $this->password = Hash::make($data['password']);
        $this->salt = base64_encode($data['password']);
        $this->role = $data['role'];
        $this->residence_id = $data['residence_id'];
        $this->save();
        return true;
    }
}
