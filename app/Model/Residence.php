<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use Notifiable;
    protected $table = 'residence';

    protected $fillable = [
        'numero', 'nom', 'nom_ref', 'prenom_ref', 'email', 'adresse', 'code_postal', 'ville',
        'tel', 'nb_partenaire', 'nb_immeuble', 'syndic_id', 'nb_motorbike', 'id_module'
    ];

    protected $hidden = [
        'actif'
    ];

    public function module()
    {
        return $this->belongsTo('App\Model\Module','id_module','id_module');
    }

    public function getAll(){
        $residence = Residence::with('module')
            ->join('users','residence.syndic_id','=','users.id')
            ->get();
        return $residence;
    }

}
