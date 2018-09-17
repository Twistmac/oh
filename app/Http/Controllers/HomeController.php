<?php

namespace App\Http\Controllers;

use App\Model\Categorie;
use App\Model\Contenu;
use App\Model\Residence;
use Illuminate\Http\Request;

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
        $categories = Categorie::all();

        $result = [];
        $result['categories'] = $categories;

        return response()->json(array(
            'result' => $result
        ));
    }
}
