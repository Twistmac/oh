<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 27/09/2018
 * Time: 13:39
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    protected $table = 'immeuble';

    protected $fillable = ['id_residence'];

    //nombre d'appartement dans un immeuble id
    public function nbrAppartementImmeuble($id){
        $nbr = Appartement::where('id_immeuble',$id)->count();
        return $nbr;
    }
}