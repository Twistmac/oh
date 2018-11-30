<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partenaires extends Authenticatable
{
    use Notifiable;
    protected $table = 'partenaires';

    protected $fillable = [
        'username', 'password', 'nom', 'prenom', 'phone', 'email', 'salt', 'residence_id', 'numero_pm', 'categorie', 'num_partenaire'
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
        $this->residence_id = $data['residence_id'];
		$this->email = $data['username'];
		$this->residence_id = $data['residence_id'];
		$this->numero_pm = $data['numero_pm'];
		$this->categorie = $data['categorie'];
        $this->save();
        return true;
    }
	
}
