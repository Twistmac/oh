<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use App\Model\Module;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ImmeubleController extends Controller
{
    //

    public function gestionImmeuble($id){
        $immeuble = Immeuble::where('id_immeuble',$id)->get();
        $appartement = Appartement::where('id_immeuble',$id)->get();
        $module = Module::all();

       return view('admin.gestion-immeuble', compact('immeuble', 'appartement','module')) ;
    }

    public function editImmeuble(Request $request, $id){
        $immeuble = Immeuble::where('id_immeuble',$id);
        $data['nom_immeuble'] = $request->nom_immeuble;
        $data['nbr_appart'] = $request->nbr_appart;
        $data['id_module'] = $request->module;
        $nb_appart_immeuble = Appartement::where('id_immeuble', $id)->count();
        $imm = Immeuble::where('id_immeuble',$id)->get();
        foreach ($imm as $item){
            $id_residence = $item->id_residence;
        }

        //
        if($immeuble->update($data)){
            if($nb_appart_immeuble == 0){
                for($i=0; $i<$request->nbr_appart;$i++){
                    Appartement::create(['id_immeuble'=>$id,'id_residence'=>$id_residence]);
                }
            }
            return redirect()->back()->with('success','Building Update');
        }
    }

    public function getImmeubleResidence($id){
        $immeuble = Immeuble::where('id_residence',$id)->get();
        return view('layouts.layout-select-immeuble', compact('immeuble'));
    }

}
