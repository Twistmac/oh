<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;
use App\Model\Membres;

class Messagerie extends Model
{
    //
    //use SyncsWithFirebase;
    protected $table = "messagerie";

    protected $fillable =['conv_name', 'messagerie', 'syndic_id', 'resident_id'];

    public function getMpSyndicResident($id){
    	$message = Messagerie::join('membres' , 'membres.id', '=', 'messagerie.resident_id')
                            ->where('id_syndic', $id)
                            ->orderBy('id_message', 'DESC')
                            ->get();
    	return $message;
    }

    //select nombre non lu par syndic
    public function getNonLuSyndic($id){
        $non_lu = Messagerie::where('vue','0')->where('id_syndic', $id)->count();
        return $non_lu;
    }

    public function detailMessage($id_syndic, $id_message){
        $detail = Messagerie::join('membres' , 'membres.id', '=', 'messagerie.resident_id')
            ->where('id_syndic', $id_syndic)
            ->where('id_message', '=', $id_message)
            ->get();
        return $detail;
    }

}
