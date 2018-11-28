<?php

namespace App\Http\Resources;

use App\Model\Categorie;
use App\Model\Membres;
use App\Model\Partenaire;
use App\Model\Residents;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnoncesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categorie_id' => $this->categorie_id,
            'titre' => $this->titre,
            'description' => $this->description,
            'image' => $this->image,
            'prix' => $this->prix,
            'residence' => $this->residence,
            'type' => $this->type,
            'genre' => $this->genre,
            'age' => $this->age,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'user_id' => Membres::where('id', $this->user_id)->first(),
            'categorie' => Categorie::where('id', $this->categorie_id)->first()->name,
            'like' => $this->like,
            'nb_like' => $this->nb_like,
            'id_partenaire' => $this->id_partenaire
        ];
    }
}
