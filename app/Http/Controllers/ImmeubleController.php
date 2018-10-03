<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ImmeubleController extends Controller
{
    //

    public function gestionImmeuble($id){
        $immeuble = Immeuble::where('id',$id)->get();
        $appartement = Appartement::where('id_immeuble',$id)->get();

       return view('admin.gestion-immeuble', compact('immeuble', 'appartement')) ;
    }

    public function editImmeuble(Request $request, $id){
        $immeuble = Immeuble::find($id);
        $immeuble->nom_immeuble = $request->nom_immeuble;
        $immeuble->nbr_appart = $request->nbr_appart;
        $nb_appart_immeuble = Appartement::where('id_immeuble', $id)->count();
        //
        if($immeuble->save()){
            if($nb_appart_immeuble == 0){
                for($i=0; $i<$request->nbr_appart;$i++){
                    Appartement::create(['id_immeuble'=>$id,'id_residence'=>$immeuble->id_residence]);
                }
            }
            return redirect()->back()->with('success','Immeuble mise à jour');
        }
    }

    public function getImmeubleResidence($id){
        $immeuble = Immeuble::where('id_residence',$id)->get();
        return view('layouts.layout-select-immeuble', compact('immeuble'));
    }

}
