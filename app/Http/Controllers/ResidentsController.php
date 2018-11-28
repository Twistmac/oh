<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use App\Model\Membres;
use App\Model\Residents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

class ResidentsController extends Controller
{
    use AuthenticatesUsers;

    public function addResident(Request $request)
    {
        $resident = new Residents();

        $data = $this->validate($request, [
            'email' => 'required|unique:membres',
            'password' => 'required|min:6'
        ]);

        $residence_explode = explode('|',$request->residence_id);
        $residence_explode = explode('|',$request->residence_id);
        $data['residence_id'] = $residence_explode[0];
        $data['syndic_id'] = $residence_explode[1];

        $data['email'] = $request->email;
        $data['username'] = $request->email;
        $data['role'] = 'resident';

        if($resident->saveResident($data))
        {
            return redirect('/admin/gestion-residents')->with('success', 'New resident added');
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
        $resident->etatResident = $input['etatResident'];

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
            $resident->username = $request->username;
            $resident->nom = $request->nom;
            $resident->prenom = $request->prenom;
            $resident->phone = $request->phone;
            $resident->email = $request->email;
            $resident->password = Hash::make($request->password);
            $resident->salt = base64_encode($request->password);
            if($resident->save()){
                return redirect()->back()->with('success','Resident update');
            }
        }
        //return $resident;
        return view('residents/details-resident', ['resident' => $resident]);
    }


    ///////////////// ---- generer Resident -------------///
    public function genererResident(Request $request){
        $request_id_residence = explode('|',$request->residence_id);
        $id_residence = $request_id_residence[0];
        $id_syndic = $request_id_residence[1];
        $id_immeuble = $request->immeuble_id;
        //
        $immeuble = new Immeuble();
        $nbr_appart = $immeuble->nbrAppartementImmeuble($id_immeuble);

        $id_appartement_array = Appartement::where('id_immeuble',$id_immeuble)->pluck('id_appartement');



        for($i=0; $i<$nbr_appart; $i++){
            $pass = $this->generateRandomString();
            $last_resident_id = DB::table('membres')->max('id');
            $data['username'] = 'res_'.$id_syndic.$id_residence.$id_immeuble.($last_resident_id+1);
            $id_resident = Residents::create([
                'username' => $data['username'],
                'email' => null,
                'password' => Hash::make($pass),
                'residence_id' => $id_residence,
                'role' => 'resident',
                'syndic_id' => $id_syndic,
                'salt' => base64_encode($pass),
                'etat' => '1'
            ])->id;
            Appartement::where('id_appartement',$id_appartement_array[$i])->update(['id_resident'=>$id_resident]);
        }
        session(['residence_select'=>$request->residence_id]);
        session(['select_immeuble'=>$id_immeuble]);
        return redirect()->back()->with('success', 'Resident Generate');
    }

    //generer un random string
    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}
