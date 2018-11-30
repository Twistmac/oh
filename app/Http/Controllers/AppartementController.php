<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    //

    public function getAppartImmeuble($id){
        $appartement = Appartement::where('id_immeuble',$id)
                        ->join('membres', 'membres.id', '=', 'appartement.id_resident')
                        ->get();
        $nbr_appart = $this->nbrAppartementImmeuble($id);
        return view('layouts.table-appartement-admin', compact('appartement'));
    }

    public function nbrAppartementImmeuble($id){
        $nbr = Appartement::where('id_immeuble',$id)->count();
        return $nbr;
    }

    public function getAppartByResident($id_resident){
        $appart = Appartement::where('id_resident', $id_resident)
                                ->join('immeuble','immeuble.id_immeuble','=','appartement.id_immeuble')
                                ->join('module', 'module.id_module','=','immeuble.id_module')
                                ->get();
        return response()->json(array(
            'result' => $appart
        ));
    }

}
