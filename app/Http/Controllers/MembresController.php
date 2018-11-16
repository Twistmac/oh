<?php

namespace App\Http\Controllers;

use App\Model\Membres;
use App\Model\Partenaire;
use App\Model\Partenaires;
use App\Model\Residence;
use App\Model\Residents;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MembresController extends Controller
{
    use AuthenticatesUsers;

    public function loginAppli(Request $request)
    {
        $credentials = $this->credentials($request);

        $login = $credentials[$this->username()];

        if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
            $lg = 'email';
        } else {
            //they sent their username instead
            $lg = 'username';
        }

        if(Membres::where($lg, $login)->count() > 0 )
        {
            if (Auth::guard('membres')->attempt([$lg => $credentials['email'], 'password' => $credentials['password']]))
            {
                $id = Auth::guard('membres')->user()->id;
                $p = Auth::guard('membres')->user()->username;

                switch ($p){
                    case NULL:
                        $pseudo = Auth::guard('membres')->user()->email;
                        break;
                    case '':
                        $pseudo = Auth::guard('membres')->user()->email;
                        break;

                    default:
                        $pseudo = $p;
                }

                $membre = Membres::find($id);
                $result['type'] = 'r';
                $result['pseudo'] = $pseudo;
                $result['id'] = $id;
                $result['success'] = 1;
                $result['role'] = $membre->role;
                $result['complete'] = $membre->complete;
                $result['syndic_id'] = $membre->syndic_id;

                $residence = Residence::where('syndic_id',$membre->syndic_id)->get();
                foreach ($residence as $res){
                    $result['nom_residence'] = $res->nom;
                }
                return response()->json(array(
                    'result' => $result,
                ));
            } else {
                $result['success'] = 2;
                return response()->json(array(
                    'result' => $result
                ));
            }
        } else {
            $result['success'] = 3;
            return response()->json(array(
                'result' => $result
            ));
        }
    }

    public function infos($user_id)
    {
        $profil = Membres::find($user_id);
        $profil->salt = base64_decode($profil->salt);

        $result = $profil;

        return response()->json(array(
            'result' => $result
        ));
    }

    //authentification appli partenaire*
    public function loginPartenaire(Request $request){
        $log = $request->getContent();
        $data = json_decode($log,true);

        //
        $partenaire_check = Partenaire::where('email',$data['email'])->get();
        if(!$partenaire_check->isEmpty()){

            foreach ($partenaire_check as $part){
                $pass = $part->password;
            }
            //comparer mdp appli
            if(Hash::check($data['password'], $pass)) {
                $result = Partenaire::where('partenaires.email',$data['email'])
                                    ->join('categories','categories.id','=','partenaires.categorie_id')
                                    ->get();
                $result[0]['pass']= $pass;
                return response()->json(array(
                    'success' => true,
                    'result'=> $result
                ));
            }
            else{
                return response()->json(array(
                    'success' => false
                ));
            }


        }
        else{
            return response()->json(array(
                'success' => false
            ));
        }

    }

    ////// update profil partenaire ///
    public function updatePartenaire (Request $request){
        $log = $request->getContent();
        $data = json_decode($log,true);

        $partenaire = Partenaire::where('id_partenaire',$data['id_partenaire']);
        $partenaire_check = Partenaire::where('id_partenaire',$data['id_partenaire'])->get();
        foreach ($partenaire_check as $part) {
            $pass = $part->password;
        }

        if($data['password']!= $pass){
            $data['password'] = Hash::make($data['password']);
            $partenaire->update($data);
            return response()->json(array(
                 'success' => true
             ));
        }
        else{
            $partenaire->update($data);
            return response()->json(array(
                 'success' => true
             ));
        }
        
    }

    //get residence by id
    public function getResidenceById($id){
        $residence = Residence::where('syndic_id', $id)->get();
        return response()->json(array(
                 'result' => $residence
             ));

    }

    //get reident by id
    public function getResidentById($id){
        $resident = Residents::where('id', $id)->get();
        return response()->json(array(
                 'result' => $resident
             ));

    }

    //get partenaire by ID
    public function getPartenaireById($id){
        $partenaire = Partenaire::where('id_partenaire', $id)->get();
        return response()->json(array(
                 'result' => $partenaire
             ));

    }

}
