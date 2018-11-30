<?php

namespace App\Http\Controllers;

use App\Model\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function gestionCategories()
    {
        $categories = Categorie::All();

        return view('admin/gestion-categories', compact('categories'));
    }

    public function addCategorie(Request $request)
    {
        $parameters = $request->except(['_token']);

        if(Categorie::create($parameters))
        {
            return redirect('/admin/gestion-categories')->with('success', 'New categorie added');
        }
    }

    public function deleteCategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'categorie deleted!!');
    }

    public function editCategorie($id, Request $request){
        $categorie = Categorie::find($id);
        $categorie->name = $request->name;
        $categorie->name_indonnesie = $request->thailand;
        $categorie->save();
        return redirect()->back()->with('success', 'categorie updated!!');

    }
}
