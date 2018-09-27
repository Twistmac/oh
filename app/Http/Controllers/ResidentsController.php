<?php

namespace App\Http\Controllers;

use App\Model\Residents;/* pour la table residents */
use App\Model\Residence;/* pour la table residence */
use App\Model\Membres;/* pour la table membres */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ResidentsController extends Controller
{
    use AuthenticatesUsers;

    /* fonction ajout résident */
    public function addResident(Request $request){
        
        $resident = new Residents();

        //$nbr_res = Residents::where('residence_id' ,'=', '8')->where('role' ,'=', 'resident')->count();
        //die((string)$nbr_res);
        /*$nb_resident = DB::table('residence')->where('nb_resident', $request->residence_id)->pluck('nb_resident');
        die((string)$nb_resident);*/

        $data = $this->validate($request, [
            'email' => 'required|unique:membres',
            'password' => 'required|min:6'
        ]);

        $residence_explode = explode('|',$request->residence_id);
        $data['residence_id'] = $residence_explode[0];
        $data['syndic_id'] = $residence_explode[1];

        $data['email'] = $request->email;
        $data['username'] = $request->email;
        $data['role'] = 'resident';

        /* mettre la residenc id dans la var */
        $idresid = $data['residence_id'];
        
        /* Modification du formulaire ajout résident sur condition limite résident */
        /* Prendre le nombre limite de résident dans la bdd dans la table residence */
        $nb_resident_pour_la_residence = Residence::where('id', $idresid)->pluck('nb_resident');
        $var_nbresident = $nb_resident_pour_la_residence[0];
       // echo "le nombre de résident maximum pour la résidence est : ".$var_nbresident;

        /* Nombre de résident déjà inséré dans la base pour la résidence */
        $nb_resident_deja_insere = Membres::where('residence_id', $idresid)->count();
        
        /* Test logique si le nombre de résident est au maximum */
        if($nb_resident_deja_insere < $var_nbresident){
            /* nous insérrons les enregistrements */
            if($resident->saveResident($data))
            {
                return redirect('/admin/gestion-residents-ajout')->with('success', 'New resident added');
            }
        } else {
            /* sinon nous retournons un message */
            \Session::flash('message','Nombre limite de résident atteint ! Enregistrement non accomplis...'); //<--FLASH MESSAGE
            return Redirect('/admin/gestion-residents-ajout');
        }
        
    }

    public function delete($id)
    {
        // dd($id);
        $resident = Residents::find($id);
        $resident->delete();

        return redirect()->back()->with('success', 'Resident deleted!!');
    }

    //suspendre resident
    public function suspendre($id){
        $resident = Residents::find($id);
        $resident->etat = 1;
        $resident->save();

        return redirect()->back()->with('success', 'Compte Resident suspendue');

    }
    //activer compte residence
    public function active($id){
        $resident = Residents::find($id);
        $resident->etat = 0;
        $resident->save();

        return redirect()->back()->with('success', 'Compte Resident activé !!!!');

    }

    public function completeProfil(Request $request)
    {
        $input = $request->all();

        $resident = Residents::find($input['idUser']);

        $resident->id = $input['idUser'];
        $resident->email = $input['email'];
        $resident->nom = $input['lastName'];
        $resident->prenom = $input['firstName'];
        $resident->birthday = $input['birthday'];
        $resident->sex = $input['sex'];
        $resident->pseudo = $input['pseudo'];
        $resident->phone = $input['phoneNumber'];
        $resident->password = Hash::make($input['password']);
        $resident->salt = base64_encode($input['password']);
        $resident->complete = 1;

        if($resident->save())
        {
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }

        return response()->json(array(
            'result' => $result
        ));
    }

    public function detailsResident(Request $request, $id)
    {
        $resident = Residents::find($id);
        if($request->isMethod('post'))
        {
//            $resident->
        }

        return view('residents/details-resident', ['resident' => $resident]);
    }
}
