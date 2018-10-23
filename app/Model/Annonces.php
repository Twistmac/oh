<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Annonces extends Model
{
    use Notifiable;
    protected $table = 'annonces';

    public function categorie()
    {
        return $this->belongsTo('App\Model\Categorie');
    }

    protected $fillable = [
        'categorie', 'titre', 'description', 'image', 'prix', 'residence', 'genre', 'age', 'actif', 'user_id', 'syndic_id'
    ];

    protected $hidden = [

    ];

    public function saveAnnonce($data)
    {
        $this->id = null;
        $this->categorie_id = $data['categorie_id'];
        $this->titre = $data['titre'];
        $this->description = $data['description'];
        $this->image = $data['image'];
        $this->prix = $data['prix'];
        $this->residence = $data['residence'];
        $this->genre = $data['genre'];
        $this->age = $data['age'];
        $this->type = $data['type'];
        $this->save();
        $LastInsertId = $this->id;
        return $LastInsertId;
    }

    public function saveJson($data)
    {
        $this->id = null;
        $this->categorie_id = $data['categorie_id'];
        $this->titre = $data['titre'];
        $this->description = $data['description'];
        $this->image = $data['image'];
        $this->prix = $data['prix'];
        $this->type = $data['type'];
        $this->save();
        $LastInsertId = $this->id;
        return $LastInsertId;
    }
}
