<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Membres extends Authenticatable
{
    use Notifiable;
    protected $table = 'membres';

    protected $fillable = [
        'email', 'password', 'nom', 'prenom', 'birthday', 'sex', 'pseudo', 'phone', 'username', 'complete'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function saveMembre($data)
    {
        $this->id = null;
        $this->email = $data['email'];
        $this->password = Hash::make($data['password']);
        $this->salt = base64_encode($data['password']);
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->birthday = $data['birthday'];
        $this->sex = $data['sex'];
        $this->pseudo = $data['pseudo'];
        $this->phone = $data['phone'];
        $this->residence_id = $data['residence_id'];
        $this->save();
        return true;
    }

    public function newResidentFromResidence($data)
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

    //get username by id
    public function getById($id){
        $username = Membres::where('id',$id)->get();
        return $username;

    }
}
