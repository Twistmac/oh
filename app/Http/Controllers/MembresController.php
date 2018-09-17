<?php

namespace App\Http\Controllers;

use App\Model\Membres;
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
}
