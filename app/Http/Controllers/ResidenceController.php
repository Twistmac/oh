<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use App\Model\Residence;
use App\Model\Residents;
use App\Model\Syndics;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    public function deleteResidence($id, $syndic_id)
    {
        $residence = Residence::find($id);
        $user = Syndics::where('id_user',$syndic_id);
        $immeuble = Immeuble::where('id_residence', $id);
        $appartement = Appartement::where('id_residence', $id);
        $resident= Residents::where('residence_id', $id);
        $appartement->delete();
        $immeuble->delete();
        $residence->delete();
        $user->delete();
        $resident->delete();

        return redirect('/admin/gestion-residences')->with('success', 'Residence deleted!!');
    }

    public function editResidence(Request $request, $id)
    {
        if($request->isMethod('post'))
        {
            $residence = Residence::find($id);

            $residence->nom = $request->nom;
            $residence->numero = $request->numero;
            $residence->nom_ref = $request->nom_ref;
            $residence->prenom_ref = $request->prenom_ref;
            $residence->email = $request->email;
            $residence->adresse = $request->adresse;
            $residence->code_postal = $request->code_postal;
            $residence->ville = $request->ville;
            $residence->tel = $request->tel;
            $residence->nb_partenaire = $request->nb_partenaire;
            $residence->nb_immeuble = $request->nb_immeuble;

            if($residence->save())
            {
                return redirect('/syndic/details-residence/'.$id)->with('success', 'Residence updated');
            }
        }
    }
}
