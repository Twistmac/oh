<?php

namespace App\Http\Controllers;

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

class SyndicsController extends Controller
{
    public function index()
    {
        return view('syndics/index');
    }

    public function gestionResidence()
    {
        $residences = Residence::where('syndic_id', Auth::user()->id)->get();

        return view('syndics/gestion-residence', compact('residences'));
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
        $categories = Categorie::all();
        $annonces = Annonces::where('type', 's')->get();

        return view('syndics/gestion-annonces-syndic', compact(array('categories', 'annonces')));
    }

    public function addResident(Request $request){
        $id = Auth::user()->id;
        $residents = Residents::where('syndic_id', '=', $id)
                                ->where('role', '=', 'resident')
                                ->get();
        $residence = Residence::where('syndic_id', '=', $id)->get();
        $resident = new Residents();

        if($request->isMethod('POST')){

            $data = $this->validate($request, [
                'email' => 'required|unique:membres',
                'password' => 'required|min:6'
            ]);

            $data['residence_id'] = $request->residence_id;
            $data['email'] = $request->email;
            $data['username'] = $request->email;
            $data['role'] = 'resident';
            $data['syndic_id'] = $id;

            if($resident->saveResident($data))
            {
                Mail::to( $request->email)
                    ->send(new MailAccess($request->email, $request->password));

                return back()->with(['success' =>'Ajout resident Success', 'error'=>'Email a été bien envoyer']);
            }
        }

        return view('syndics/gestion-resident', compact(array('residents', 'residence')));
    }

    //delete resident
    public function deleteResident($id){
        $resident = Residents::find($id);
        $resident->delete();

        return redirect()->back()->with('success', 'Resident supprimer avec success!!');
    }
}
