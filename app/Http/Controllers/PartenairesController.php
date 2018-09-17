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
            'username' => 'required|unique:membres',
            'password' => 'required|min:6'
        ]);

        $data['residence_id'] = $request->residence_id;
        $data['role'] = 'partenaire';

        if($partenaire->savePartenaire($data))
        {
            return redirect('/admin/gestion-partenaires')->with('success', 'New partenaire added');
        }
    }
}
