<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use Notifiable;
    protected $table = 'residence';

    protected $fillable = [
        'numero', 'nom', 'nom_ref', 'prenom_ref', 'email', 'adresse', 'code_postal', 'ville', 'tel', 'nb_partenaire', 'nb_resident', 'syndic_id'
    ];

    protected $hidden = [
        'actif'
    ];
}
