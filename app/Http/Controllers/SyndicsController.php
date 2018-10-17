<?php

namespace App\Http\Controllers;

use App\Model\Annonces_syndic;
use App\Model\Appartement;
use App\Model\Immeuble;
use App\Model\Membres;
use App\Model\Annonces;
use App\Model\Categorie;
use App\Model\Residence;
use App\Model\Residents;
use App\Model\Syndics;
use App\Mail\MailAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use \App\Model\Messagerie;
use Illuminate\Support\Facades\DB;


class SyndicsController extends Controller
{
    public function index()
    {
        return redirect()->action('SyndicsController@gestionResidence');
    }

    public function gestionResidence()
    {
        $residences = Residence::where('syndic_id', Auth::user()->id )->get();
        foreach ($residences as $res){
            $id_residence = $res->id_residence;
        }
        //immeuble
        $immeuble = Immeuble::where('id_residence',$id_residence)->get();

        return view('syndics/gestion-residence', compact('immeuble'));
    }

    public function addResidence()
    {
        return view('syndics/add-residence');
    }

    public function newResident(Request $request, $id)
    {
        $membre = new Membres();

        $data = $this->validate($request, [
            'username' => 'required|unique:membres',
            'password' => 'required|min:6'
        ]);

        $data['residence_id'] = $id;
        $data['role'] = 'resident';

        if($membre->newResidentFromResidence($data))
        {
            return redirect('/syndic/details-residence/'.$id)->with('success', 'New resident added');
        }
    }

    public function newResidence(Request $request)
    {
        $data = $this->validate($request, [
            'numero' => 'required|unique:residence',
            'nom' => 'required',
            'nom_ref' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
            'tel' => 'required',
            'nb_partenaire' => 'required',
            'nb_resident' => 'required'
        ]);

        $data['syndic_id'] = Auth::user()->id;

        if(Residence::create($data))
        {
            return redirect('/syndic/gestion-residence')->with('success', 'New Residence added');
        }
    }

    public function detailsResidence($id)
    {
        $res = Residence::find($id);

        return view('syndics/details-residence', compact('res'));
    }

    public function addSyndic(Request $request)
    {
        $syndic = new Syndics();

        $data = $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        if($syndic->saveSyndic($data))
        {
            Mail::to( $request->email)
                  ->send(new MailAccess($request->email, $request->password));

            return redirect('/admin/gestion-syndics')->with(['success'=> 'New Syndic added', 'error'=>'Un email a été bien envoyer']);
        }
    }

    public function deleteSyndic($id)
    {
        $syndic = Syndics::find($id);
        $syndic->delete();

        return redirect('/admin/gestion-syndics')->with('success', 'Syndic deleted!!');
    }

    public function details(Request $request,$id)
    {
        $syndic = Syndics::find($id);

        if($request->isMethod('post'))
        {
            $syndic->username = $request->username;
            $syndic->password = Hash::make($request->password);
            $syndic->email = $request->email;

            if($syndic->save())
            {
                return redirect('/admin/details-syndic/'.$id)->with('success', 'Syndic updated!!');
            }
        }

        return view('syndics/details', compact('syndic'));
    }

    public function gestionAnnoncesSyndic()
    {
        $user_id= Auth::user()->id;
        $categories = Categorie::all();
        $annonces = Annonces_syndic::where('syndic_id', $user_id)
                                    ->join('categories', 'categories.id','=','annonces_syndic.categorie_id')
                                    ->get();

        return view('syndics/gestion-annonces-syndic', compact(array('categories', 'annonces')));
    }

    public function addResident(Request $request){
        $id = Auth::user()->id;
        $residents = Residents::where('syndic_id', '=', $id)
                                ->where('role', '=', 'resident')
                                ->join('appartement','appartement.id_resident','=','membres.id')
                                ->join('immeuble','immeuble.id','=','appartement.id_immeuble')
                                ->get();

        return view('syndics/gestion-resident', compact(array('residents')));
    }

    //delete resident
    public function deleteResident($id){
        $resident = Residents::find($id);
        $resident->delete();

        return redirect()->back()->with('success', 'Resident supprimer avec success!!');
    }

    //appartement par immeuble (ajax)
    public function immeubleAppart($id_immeuble){
        $requete =  Appartement::where('id_immeuble',$id_immeuble)
                    ->join('membres','appartement.id_resident','=','membres.id')->get();
        if(!$requete->isEmpty()){
            $appart = $requete;
        }
        else{
            $appart = Appartement::where('id_immeuble',$id_immeuble)->get();
        }
        return view('syndics/tbody-appart',compact('appart'));
    }

    //edition immeuble
    public function editImmeuble(Request $request, $id_immeuble){
        $immeuble = Immeuble::find($id_immeuble);
        $immeuble->nom_immeuble = $request->nom_immeuble;
        $immeuble->nbr_appart = $request->nbr_appart;
        $id_syndic = Auth::user()->id;
        $residence = Residence::where('syndic_id',$id_syndic)->get();
        foreach($residence as $res){
            $id_residence = $res->id_residence;
        }
        $immeuble->save();
        for($i= 0; $i<$request->nbr_appart; $i++){
            Appartement::create(['id_residence'=> $id_residence, 'id_immeuble'=> $id_immeuble]);
        }


        return redirect()->back()->with('succcess','Immeuble Update');
    }

    //generer resident
    public function genererResident(Request $request){
        $id_syndic = Auth::user()->id;
        $residence = Residence::where('syndic_id',$id_syndic)->get();
        foreach ($residence as $res){
            $id_residence = $res->id_residence;
        }
        $immeuble = Immeuble::where('id_residence',$id_residence)->get();

        //if generer resident automatique
        if($request->isMethod('Post')){
            $id_immeuble = $request->immeuble_id;
            //
            $immeubles = new Immeuble();
            $nbr_appart = $immeubles->nbrAppartementImmeuble($id_immeuble);

            $id_appartement_array = Appartement::where('id_immeuble',$id_immeuble)->pluck('id_appartement');

            for($i=0; $i<$nbr_appart; $i++){
                $pass = $this->generateRandomString();
                $last_resident_id = DB::table('membres')->max('id');
                $data['username'] = 'res_'.$id_syndic.$id_residence.$id_immeuble.($last_resident_id+1);
                $id_resident = Residents::create([
                    'username' => $data['username'],
                    'email' => '',
                    'password' => Hash::make($pass),
                    'residence_id' => $id_residence,
                    'role' => 'resident',
                    'syndic_id' => $id_syndic,
                    'salt' => base64_encode($pass),
                    'etat' => '1'
                ])->id;
                Appartement::where('id_appartement',$id_appartement_array[$i])->update(['id_resident'=>$id_resident]);
            }
            session(['select_immeuble'=>$id_immeuble]);
            return redirect()->back()->with('success', 'Resident Generate');
        }

        return view('syndics/generer-resident',compact('immeuble'));
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
