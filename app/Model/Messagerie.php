<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;
use App\Model\Membres;
use SafeStudio\Firebase\Firebase;

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
        $firebase = new Firebase();

        $chatSyndic = $firebase->get('/data_messages/chatsSyndic/',['orderBy'=>'"idSyndic"',
            'equalTo'=>$id ]);
        $mp_syndic = json_decode($chatSyndic, true);
        foreach ($mp_syndic as $key => $value) {
            $key_chat[] = $key;
        }
        for($i=0; $i<sizeof($mp_syndic); $i++){
            $conversation[] = json_decode($firebase->get('/data_messages/conversationsSyndic/'.$key_chat[$i]),true);
            foreach ( (array)$conversation[$i] as $conv){
                $mp[]= $conv;
            }
        }
        foreach ($mp as $todo){
            $array_read[] = $todo['read'];
        }

        return array_count_values($array_read)[0];
    }

    public function detailMessage($id_syndic, $id_message){
        $detail = Messagerie::join('membres' , 'membres.id', '=', 'messagerie.resident_id')
            ->where('id_syndic', $id_syndic)
            ->where('id_message', '=', $id_message)
            ->get();
        return $detail;
    }

}
