<?php

namespace App\Http\Controllers;

use App\Model\Partenaires;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class PartenairesController extends Controller
{
    use AuthenticatesUsers;

    public function addPartenaire(Request $request)
    {
        $partenaire = new Partenaires();

        $data = $this->validate($request, [
            'username' => 'required|unique:partenaires',
            'password' => 'required|min:6'
        ]);

        $data['residence_id'] = $request->residence_id;
        $data['categorie'] = $request->categorie;
		$data['numero_pm'] = $request->numero_pm;
		
		
        if($partenaire->savePartenaire($data))
        {
            return redirect('/admin/gestion-partenaires')->with('success', 'Nouveau partenaire ajouté');
        }
    }
	
	public function delete($id)
    {
        // dd($id);
        $partenaire = Partenaires::find($id);
        $partenaire->delete();

        return redirect()->back()->with('success', 'Partenaire supprimé!!');
    }
}
