<?php

namespace App\Http\Controllers;

use App\Model\Residents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ResidentsController extends Controller
{
    use AuthenticatesUsers;

    public function addResident(Request $request)
    {
        $resident = new Residents();

        $data = $this->validate($request, [
            'username' => 'required|unique:membres',
            'password' => 'required|min:6'
        ]);

        $data['residence_id'] = $request->residence_id;
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
