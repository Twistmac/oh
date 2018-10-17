<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 15/10/2018
 * Time: 15:51
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Annonces_syndic extends Model
{
    protected $table = 'annonces_syndic';

    protected $fillable = [
        'categorie_id', 'titre', 'description', 'image', 'prix', 'genre', 'age', 'syndic_id'
    ];

}