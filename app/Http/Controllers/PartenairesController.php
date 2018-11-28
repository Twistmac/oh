<?php

namespace App\Http\Controllers;

use App\Model\Partenaire;
use App\Model\Residence;
use App\Model\Residents;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class PartenairesController extends Controller
{
    use AuthenticatesUsers;

    public function addPartenaire(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|unique:partenaires',
        ]);

        $data['username'] = null;
        $data['role'] = 0;
        $data['residence_id'] = $request->residence_id;
        $data['categorie_id'] = $request->categorie;
        $pass = $this->generateRandomString();
        $data['password'] = Hash::make($pass);
        $data['salt'] = base64_encode($pass);
		$data['numero_pm'] = $request->numero_pm;
		$data['type'] = $request->type;

		
        if(Partenaire::create($data))
        {
            return redirect('/admin/gestion-partenaires')->with('success', 'new record');
        }
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
	
	public function delete($id)
    {
        // dd($id);
        $partenaire = Partenaire::where('id_partenaire', $id);
        $partenaire->delete();

        return redirect()->back()->with('success', 'Partner deleted!!');
    }

    //suspendre resident
    public function suspendre($id){
        $partenaire = Partenaire::where('id_partenaire', $id);
        $data['etat'] = 1;
        $partenaire->update($data);

        return redirect()->back()->with('success', 'Partner account suspend');

    }
    //activer compte residence
    public function active($id){
        $partenaire = Partenaire::where('id_partenaire', $id);
        $data['etat'] = 0;
        $partenaire->update($data);

        return redirect()->back()->with('success', 'Partner account suspend');

    }

    public function editPartenaire(Request $request, $id, $type){
        $partenaire = Partenaire::where('id_partenaire', $id)->get();
        $part = Partenaire::where('id_partenaire', $id);
        $residence = Residence::all();
        //return $partenaire;
        if($request->isMethod('post')){
            $data['username'] = $request->username;
            $data['nom'] = $request->name;
            $data['prenom'] = $request->firstname;
            $data['phone'] = $request->phone;
            $data['residence_id'] = $request->residence_id;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['salt'] = base64_encode($request->password);
            $data['numero_pm'] = $request->numero_pm;

            if($part->update($data)){
                return redirect()->back()->with('success', 'Partner account update');
            }
        }

        return view('admin.edit-partenaire', compact('type', 'partenaire', 'residence'));
    }

}
