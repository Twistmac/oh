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
}
