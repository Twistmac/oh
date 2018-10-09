<?php

namespace App\Http\Controllers;

use App\Model\Annonces;
use App\Model\Categorie;
use App\Model\Contenu;
use App\Model\Immeuble;
use App\Model\Membres;
use App\Model\Partenaires;
use App\Model\Residence;
use App\Model\Residents;
use App\Model\Syndics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Excel_XML;

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
    /* ajout de résident */
    public function gestionResidentsajout()
    {
        $residents = Membres::where('role', 'resident')->get();
        $residences = Residence::all();

        return view('admin/gestion-residents-ajout', compact(array('residents', 'residences')));
    }

    public function gestionResidences()
    {
        $residences = Residence::join('users','residence.syndic_id','=','users.id')->get();
        return view('admin/gestion-residences', compact(array('residences')));
    }

    /* ajout de résidence */
    public function gestionResidencesajout()
    {
        $residences = Residence::join('users','residence.syndic_id','=','users.id');

        return view('admin/gestion-residences-ajout', compact(array('residences', 'residences')));
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
        $syndic['email'] = $request->email;
        $mdp = $this->generateRandomString();
        $syndic['password'] = Hash::make($mdp);
        $syndic['salt'] = base64_encode($mdp);

        $data = $this->validate($request, [
            'numero' => 'required|unique:residence',
            'nom' => 'required',
            'nom_ref' => 'required',
            'prenom_ref' => 'required',
            'email' => 'required|unique:users',
            'adresse' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
            'tel' => 'required',
            'nb_partenaire' => 'required',
            'nb_immeuble' => 'required',
            'nb_motorbike' => 'required'
        ]);

        $data['nb_immeuble'] = $request->nb_immeuble;
        $data['nb_motorbike'] = $request->nb_motorbike;
        if($id_syndic = Syndics::create($syndic)->id){
            $data['syndic_id'] = $id_syndic;

            if(Residence::create($data))
            {
                $residence_id = Residence::orderBy('id_residence', 'desc')->first()->id_residence ;
                for($i= 0; $i<$request->nb_immeuble; $i++){
                    Immeuble::create(['id_residence'=> $residence_id]);
                }
                return redirect('/admin/gestion-residences')->with('success', 'Nouveau résident ajouté');	
            }
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

    public function editResidence(Request $request, $id)
    {
        $residence = Residence::where('id_residence',$id)->get();

        $residents = Residents::where(['role' => 'resident', 'residence_id' => $id])->get();
        $partenaires = Partenaires::where(['role' => 'partenaire', 'residence_id' => $id])->get();
        $immeubles = Immeuble::where('id_residence',$id)->get();

        if ($request->isMethod('POST'))
        {
            $residence = where('syndic_id',$id)->get();

            $residence->nom = $request->nom;
            $residence->nom_ref = $request->nom_ref;
            $residence->prenom_ref = $request->prenom_ref;
            $residence->email = $request->email;
            $residence->adresse = $request->adresse;
            $residence->code_postal = $request->code_postal;
            $residence->ville = $request->ville;
            $residence->tel = $request->tel;
            $residence->nb_partenaire = $request->nb_partenaire;
            $residence->nb_immeuble = $request->nb_immeuble;
            $residence->nb_motorbike = $request->nb_motorbike;

            if($residence->save())
            {
                $residences = Residence::all();
                $syndics = User::all();

                return redirect('admin/gestion-residences')
                        ->with('success', 'Residence Update');
            }
        }

        return view('admin/edit-residence', compact(['residence', 'residents', 'partenaires', 'immeubles']));
    }

	//**********code import export de données**************//
	
	public function importexport(){
			return view('admin/importexport');
	}
	
	public function exportresidenceexcel(){
		
		$residenceArray = array();
		$residences = Residence::get();
		
		$data = array(1 => array ('id', 'numero','nom','nom_ref','prenom_ref','email','adresse','code_postal','ville','tel','nb_partenaire','nb_immeuble','actif', 'created_at', 'updated_at', 'syndic_id', 'nb_motorbike'));
		
		foreach ($residences as $value) {
			$data[] = array ($value->id, $value->numero,$value->nom,$value->nom_ref,$value->prenom_ref,$value->adresse,$value->code_postal,$value->ville, $value->tel, $value->nb_partenaire, $value->nb_immeuble, $value->actif, $value->created_at,$value->updated_at,$value->syndic_id,$value->nb_motorbike);}
		
		$xls = new Excel_XML('UTF-8', false, 'Résidences');
		$xls->addArray($data);
		$xls->generateXML('Residences');
		exit();
	}
	
	public function exportresidencecsv(){
		
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=residences.csv');
		$output = fopen('php://output', 'w');
	
		$residence = Residence::get();
		foreach ($residence as $value) {
			fputcsv($output, array($value->id, $value->numero,$value->nom,$value->nom_ref,$value->prenom_ref,$value->adresse,$value->code_postal,$value->ville, $value->tel, $value->nb_partenaire, $value->nb_immeuble, $value->actif, $value->created_at,$value->updated_at,$value->syndic_id,$value->nb_motorbike) );
		}
		exit;
	}
	//pour les résidents
	public function exportresidentsexcel(){
		$residentsArray = array();
		$residents = Residents::where('role','resident')->get();
		
		$data = array(1 => array ('id', 'username','nom','prenom','birthday','sex','pseudo','phone','email','residence_id','syndic_id','created_at','role'));
		
		foreach ($residents as $value) {
			$data[] = array ($value->id, $value->username,$value->nom,$value->prenom,$value->birthday,$value->sex,$value->pseudo,$value->phone, $value->email, $value->residence_id, $value->syndic_id, $value->created_at, $value->role);}
		
		$xls = new Excel_XML('UTF-8', false, 'Résidents');
		$xls->addArray($data);
		$xls->generateXML('Residents');
		exit();
	}
	
	public function exportresidentscsv(){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=residents.csv');
		$output = fopen('php://output', 'w');
	
		$residents = Residents::where('role','resident')->get();
		foreach ($residents as $value) {
			fputcsv($output, array($value->id, $value->username,$value->nom,$value->prenom,$value->birthday,$value->sex,$value->pseudo,$value->phone, $value->email, $value->residence_id, $value->syndic_id, $value->created_at, $value->role) );
		}
		exit;
	}
	
	
	//**********FIN export import **************//
	
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
