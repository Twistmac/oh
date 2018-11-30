<?php

namespace App\Http\Controllers;

use App\Model\Membres;
use Hoa\Websocket\Server;
use Illuminate\Http\Request;
use \App\Model\Messagerie;
use Auth;
use SafeStudio\Firebase\Firebase;


class MessagerieController extends Controller
{
    //

    public function messageSyndic(){
    	$id = Auth::User()->id;
        $firebase = new Firebase();

        $chatSyndic = $firebase->get('/data_messages/chatsSyndic/',['orderBy'=>'"idSyndic"',
                                        'equalTo'=>$id ]);

        $mp_syndic = json_decode($chatSyndic, true);
        $membre = new Membres();

        return view('syndics.messagerie', compact('mp_syndic','membre', 'conv'));
    }

    public function getConversation($chatId){
        $firebase = new Firebase();
       $conversation =  json_decode($firebase->get('/data_messages/conversationsSyndic/'.$chatId),true);
       $this->readMessageSyndic($chatId);

        $membre = new Membres();
        return view('syndics.layout-conversation', compact( 'conversation','membre'));
    }

    public function getNewMessageSyndic(){
        $id = Auth::User()->id;
        $messagerie = new Messagerie();
        return $messagerie->getNonLuSyndic($id);
    }

    public function readMessageSyndic($chatId){
        $firebase = new Firebase();
        $dataU = [ 'read' => 1];
        $firebase->update('/data_messages/chatsSyndic/'.$chatId, $dataU);
        return true;

    }

    //marquer lue message
    public function readMp($id_message){
        $messagerie = Messagerie::where('id_message',$id_message);
        $messagerie->update(['vue'=>'1']);
        return;

    }

    public function testmessage(){
        /*$id = Auth::User()->id;
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
        $membre = new Membres();
        return view('layouts.table-message-syndic',compact('mp', 'membre'));*/
    }

    //refresh table message syndic
    public function refreshMessage(){

        $id = Auth::User()->id;
        $firebase = new Firebase();

        $chatSyndic = $firebase->get('/data_messages/chatsSyndic/',['orderBy'=>'"idSyndic"',
            'equalTo'=>$id ]);

        $mp_syndic = json_decode($chatSyndic, true);

        foreach ((array)$mp_syndic as $key => $value) {
            $key_chat[] = $key;
        }

        $membre = new Membres();

        return view('layouts.table-message-syndic', compact('mp_syndic','membre'));
    }

    //reponse au message
    public function repondre($messageId, Request $request){
        $id = Auth::User()->id;
        $firebase = new Firebase();
        $data = [
            'key'=>"",
            'message'=>$request->message,
            'messageId'=>$messageId,
            'receivedId'=>$request->senderId,
            'senderId'=>$id,
            'status'=>$request->senderId.'_unread',
            'read'=> 3,
            'timestamp'=>date("d M Y G:i")
        ];
        $dataU = [ $id => 0];

        $message_envoyer = Messagerie::create([
                                'conv_name'=> $request->senderId.'_'.$id,
                                'messagerie'=> $request->message,
                                'id_syndic'=> $id,
                                'resident_id'=> $request->senderId
                            ]);
        if($message_envoyer){
            $push = $firebase->push('/data_messages/conversationsSyndic/'.$messageId, $data);
            $update = $firebase->update('/data_messages/chatsSyndic/'.$messageId.'/countUnread/', $dataU);
        }
        return redirect()->route('syndic.messagerie')->with('success','Message send success');
    }

    //message envoyer
    public function messageSend(){
        $id = Auth::User()->id;
        $messagerie = new Messagerie();
        $mp_send = $messagerie->getMpSyndicResident($id);
        return view('syndics.message-envoyer',compact('mp_send'));
    }

}
