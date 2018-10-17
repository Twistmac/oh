<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 16/10/2018
 * Time: 10:30
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Coms_annonce extends Model
{
    protected $table = 'coms_annonce';
    protected  $fillable = ['id_annonce', 'id_membre', 'commentaire'];

    public function nbr_coms($id_annonce){
        $nb = Coms_annonce::where('id_annonce',$id_annonce)->count();
        return $nb;
    }
}