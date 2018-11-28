<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 18/10/2018
 * Time: 16:34
 */

namespace App\Model;
use App\Model\Residence;


use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $table = 'partenaires';


    protected $fillable = [
        'username', 'password', 'nom', 'prenom', 'phone', 'email', 'salt',
        'residence_id', 'categorie_id', 'type', 'etat'
    ];

    protected $hidden = [
        'password', 'remember_token', 'salt'
    ];

    public function savePartenaire($data)
    {

        $this->id = null;
        $this->username = null;
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

    public function residence(){
        return $this->belongsTo('App\Model\Residence','residence_id','syndic_id');
    }

    public function getAll(){
        $partenaire = Partenaire::with('residence')
                                ->join('categories','partenaires.categorie_id','=', 'categories.id')
                                ->get();
        return $partenaire;
    }
}