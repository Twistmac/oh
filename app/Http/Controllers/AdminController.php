<?php

namespace App\Http\Controllers;

use App\Model\Annonces;
use App\Model\Categorie;
use App\Model\Contenu;
use App\Model\Membres;
use App\Model\Partenaires;
use App\Model\Residence;
use App\Model\Residents;
use App\Model\Syndics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $syndics = User::all();
        $residences = Residence::all();
        $residents = Membres::where('role', 'resident')->get();
        $partenaires = Membres::where('role', 'partenaire')->get();
        /* prendre tout les annonces et compter le total directement*/
        $annonces = Annonces::count();


        return view('admin/index', compact(array('syndics', 'residences', 'partenaires', 'residents', 'annonces')));
    }

    public function gestionSyndics()
    {
        $syndics = User::All();

        return view('admin/gestion-syndics', compact('syndics'));
    }

    public function gestionResidents()
    {
        $residents = Membres::where('role', 'resident')->get();
        $residences = Residence::all();

        return view('admin/gestion-residents', compact(array('residents', 'residences')));
    }

    public function gestionResidences()
    {
        $residences = Residence::all();
        $syndics = User::all();

        return view('admin/gestion-residences', compact(array('residences', 'syndics')));
    }

    public function gestionPartenaires()
    {
        $partenaires = Membres::where('role', 'partenaire')->get();
        $residences = Residence::all();

        return view('admin/gestion-partenaires', compact(array('partenaires', 'residences')));
    }

    public function gestionAnnonces()
    {
        $categories = Categorie::all();
        $annonces = Annonces::all();

        return view('admin/gestion-annonces', compact(array('categories', 'annonces')));
    }

    public function addResidence(Request $request)
    {
        if(($request->email_syndic != '') && ($request->password_syndic != ''))
        {
            $syndic['email'] = $request->email_syndic;
            $syndic['password'] = Hash::make($request->password_syndic);
            $syndic['salt'] = base64_encode($request->password_syndic);
            $new_syndic = Syndics::create($syndic);
        }

        $data = $this->validate($request, [
            'numero' => 'required|unique:residence',
            'nom' => 'required',
            'nom_ref' => 'required',
            'prenom_ref' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
            'tel' => 'required|integer',
            'nb_partenaire' => 'required',
            'nb_resident' => 'required'
        ]);

        if(isset($new_syndic['id']))
        {
            $data['syndic_id'] = $new_syndic['id'];
        } else {
            $data['syndic_id'] = $request->syndic_id;
        }

        if(Residence::create($data))
        {
            return redirect('/admin/gestion-residences')->with('success', 'New Residence added');
        }
    }

    public function gestionContenu()
    {
        $page = Contenu::find(1);
        return view('admin/gestion-contenu', compact('page'));
    }

    public function editTermes(Request $request, $id)
    {
        $page = Contenu::findOrFail($id);

        $data = $this->validate($request, [
            'titre' => 'required|min:3',
            'content' => 'required'
        ]);

        if ($page->update($data))
        {
            return redirect()->route('admin.gestion-contenu');
        }
    }

    public function editResidence($id)
    {
        $residence = Residence::findOrFail($id);

        $residents = Residents::where(['role' => 'resident', 'residence_id' => $residence->id])->get();
        $partenaires = Partenaires::where(['role' => 'partenaire', 'residence_id' => $residence->id])->get();

        return view('admin/edit-residence', compact(['residence', 'residents', 'partenaires']));
    }
}
