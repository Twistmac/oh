<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Messagerie;
use Auth;



class MessagerieController extends Controller
{
    //

    public function messageSyndic(){
    	$id = Auth::User()->id;
    	$messagerie = new Messagerie();
    	$mp = $messagerie->getMpSyndicResident($id);

    	return view('syndics.messagerie', compact('mp'));
    }

    public function getNewMessageSyndic(){
        $id = Auth::User()->id;
        $messagerie = new Messagerie();
        return $messagerie->getNonLuSyndic($id);
    }

    public function readMessageSyndic(Request $request){
        $id = Auth::User()->id;
        $messagerie = new Messagerie();

        $id_message = $request->id_message;
        $detail = $messagerie->detailMessage($id, $id_message);
        return view('syndics.read-message',compact('detail'));

    }

    //marquer lue message
    public function readMp($id_message){
        $messagerie = Messagerie::where('id_message',$id_message);
        $messagerie->update(['vue'=>'1']);
        return;

    }

    //refresh table message syndic
    public function refreshMessage(){
        $id = Auth::User()->id;
        $messagerie = new Messagerie();
        $mp = $messagerie->getMpSyndicResident($id);
        return view('layouts.table-message-syndic',compact('mp'));
    }

}
