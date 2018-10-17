<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 15/10/2018
 * Time: 17:43
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Likes_syndics extends Model
{
    protected $table = 'likes_syndics';

    public function nbr_like($annonce_id){
        $nb = Likes_syndics::where('annonce_id',$annonce_id)->count();
        return $nb;
    }

    public function etatLike($annonce_id, $id_user){
        $like = Likes_syndics::where(array('annonce_id'=>$annonce_id, 'membre_id'=>$id_user))->get();
        if(!$like->isEmpty()){
            return true;
        }else{
            return false;
        }
    }

}