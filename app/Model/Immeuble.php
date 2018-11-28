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

    public function module(){
        return $this->belongsTo('App\Model\Module','id_module','id_module');
    }

    //get immeuble avec module
    public function withModule($residence){
        $immeuble = Immeuble::with('module')
                    ->where('id_residence', $residence)
                    ->get();
        return $immeuble;

    }
}