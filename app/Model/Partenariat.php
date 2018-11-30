<?php
/**
 * Created by PhpStorm.
 * User: Twist_Geek
 * Date: 30/11/2018
 * Time: 07:10
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Partenariat extends Model
{
    public $table = 'partenariat';
    public $fillable = ['id_partenaire','id_syndic'];

    public function residence(){
        return $this->belongsTo('App\Model\Residence','id_syndic','syndic_id');
    }

    public function getPartenariat($id_partenaire){

        return Partenariat::with('residence')->where('id_partenaire',$id_partenaire)->get();
    }

}