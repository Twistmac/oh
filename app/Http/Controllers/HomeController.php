<?php

namespace App\Http\Controllers;

use App\Model\Categorie;
use App\Model\Contenu;
use App\Model\Residence;
use App\Model\Residents;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Mail\MailAccess;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Mail;

class HomeController extends Controller
{
    public function termes()
    {
        $page = Contenu::first();

        return response()->json(array(
            'result' => $page
        ));
    }

    public function categories()
    {
        $categories = Categorie::orderBy('name','ASC')->get();

        $result = [];
        $result['categories'] = $categories;

        return response()->json(array(
            'result' => $result
        ));
    }

    public function forgotPassword(Request $request, $email){

        $pass = $this->generateRandomString();
        $resident = Residents::where('email', $email);
        $update = $resident->update(['password'=>Hash::make($pass),
                            'salt'=> base64_encode($pass)
                    ]);
        if($update){
            Mail::to($email)
                ->send(new MailAccess($pass));

            return response()->json(array(
                'success' => true
            ));
        }

    }


    function generateRandomString($length = 6) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }

    public function importExport()
    {
        $dbhost = env('DB_HOST');
        $dbport = env('DB_PORT');
        $dbuser = env('DB_USERNAME');
        $dbpass = env('DB_PASSWORD');
        $dbname = env('DB_DATABASE');
        $mysqldump=exec('mysqldump');


        $command = "mysqldump --opt -h localhost -u" .$dbhost. '.$dbpass'.' > mydb.sql 2>&1';

        exec("mysqldump --opt -h localhost -u root test > mydb.sql 2>&1", $output);
        print_r($output);
    }



}
