<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnoncesResource;
use App\Model\Annonces;
use App\Model\Likes;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    public function addAnnonce(Request $request)
    {
        $annonce = new Annonces();

        $data = $this->validate($request, [
            'categorie_id' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'residence' => 'required',
            'age' => 'required',
        ]);
        $data['type'] = 'o';
        $data['genre'] = '';
        $image = $request->file('image');
        if($image == null)
        {
            $date['image'] = '';
        } $data['image'] = time().'_annonce.'.$image->getClientOriginalExtension();

        $last = $annonce->saveAnnonce($data);

        if($last)
        {
            $destinationPath = public_path('/img/annonces/');
            $image->move($destinationPath, $data['image']);
            return redirect('/admin/gestion-annonces')->with('success', 'New Annonce added');
        }
    }

    public function addAnnonceSyndic(Request $request)
    {
        $annonce = new Annonces();

        $data = $this->validate($request, [
            'categorie_id' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'residence' => 'required',
            'age' => 'required',
        ]);
        $data['type'] = 's';
        $data['genre'] = '';
        $image = $request->file('image');
        if($image == null)
        {
            $date['image'] = '';
        } $data['image'] = time().'_annonce.'.$image->getClientOriginalExtension();

        $last = $annonce->saveAnnonce($data);

        if($last)
        {
            $destinationPath = public_path('/img/annonces/');
            $image->move($destinationPath, $data['image']);
            return redirect('/syndic/gestion-annonces-syndic')->with('success', 'New Annonce syndic added');
        }
    }



    public function annoncesJson($type,$user_id)
    {
        $result = Annonces::all();

        $annonces = AnnoncesResource::collection($result);

        $data= [];

        foreach ($annonces as $item)
        {
            $query_like = Likes::where(array('annonce_id' => $item['id'], 'membre_id' => $user_id))->first();

            $likes = Likes::where(array('annonce_id' => $item['id']))->count();

            if($query_like)
            {
                $like = true;

            } else $like = false;

            $item['like'] = $like;
            $item['nb_like'] = $likes;

            array_push($data, $item);
        }

        return response()->json(array(
            'result' => $data
        ));
    }

    public function likeJson($id_annonce, $user_id)
    {
        $data = Likes::where(array('annonce_id' => $id_annonce, 'membre_id' => $user_id))->get();

        if(count($data) < 1)
        {
            // Like
            $likes = new Likes();

            $data['annonce_id'] = $id_annonce;
            $data['membre_id'] = $user_id;

        } else {
            // Dislike
            Likes::where(array('annonce_id' => $id_annonce, 'membre_id' => $user_id))->delete();
        }
    }

    public function saveAnnonceJson(Request $request)
    {
        $input = $request->get('formulaire');

        $data = json_decode($input);

        $annonce = new Annonces();

        $annonce->titre = $data->titre;
        $annonce->description = $data->description;
        $annonce->prix = $data->prix;
        $annonce->categorie_id = $data->categorie;
        $annonce->type = $data->type;
        $annonce->user_id = (int) $data->id_User;

        $name = time() . '_annonce';

        $ImageNews = $_FILES['image']['name'];

        $ImageNews = getimagesize($_FILES['image']['tmp_name']);

        if ($ImageNews['mime'] == "image/png") {

            $ImageChoisie = imagecreatefrompng($_FILES['image']['tmp_name']);
            $TailleImageChoisie = getimagesize($_FILES['image']['tmp_name']);
            $NouvelleLargeur = 350; //Largeur choisie à 350 px mais modifiable
            $NouvelleHauteur = ( ($TailleImageChoisie[1] * (($NouvelleLargeur)/$TailleImageChoisie[0])) );
            $NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur);

            imagecopyresampled($NouvelleImage , $ImageChoisie  , 0,0, 0,0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
            imagedestroy($ImageChoisie);
            imagepng($NouvelleImage ,public_path()."/img/annonces/".$name. ".png", 7);
            $extension = "png";

            $annonce->image = $name.'.'.$extension;

            $annonce->save();

            $result['result'] = 'ok';

        }elseif ($ImageNews['mime'] == "image/jpg" || $ImageNews['mime'] == "image/jpeg") {

            $ImageChoisie = imagecreatefromjpeg($_FILES['image']['tmp_name']);
            $TailleImageChoisie = getimagesize($_FILES['image']['tmp_name']);
            $NouvelleLargeur = 350; //Largeur choisie à 350 px mais modifiable
            $NouvelleHauteur = ( ($TailleImageChoisie[1] * (($NouvelleLargeur)/$TailleImageChoisie[0])) );
            $NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur);

            imagecopyresampled($NouvelleImage , $ImageChoisie  , 0,0, 0,0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
            imagedestroy($ImageChoisie);
            imagejpeg($NouvelleImage ,public_path()."/img/annonces/".$name. ".jpg", 100);
            $extension = "jpg";

            $annonce->image = $name.'.'.$extension;

            $annonce->save();

            $result['result'] = 'ok';

        }else{
            $result['result'] = 'Format de la photo invalide, Veuillez le changer';
        }

        return response()->json(array(
            'result' => $result,
        ));
    }

    public function myAnnoncesJson($id)
    {
        $annonces = Annonces::where('user_id', $id)->get();

        return response()->json(array(
            'result' => $annonces,
        ));
    }

    public function deleteJson($id)
    {
        $annonce = Annonces::find($id);
        $annonce->delete();

        return response()->json(array(
            'result' => true
        ));
    }

    public function deleteAnnonce($id)
    {
        $annonce = Annonces::find($id);
        $annonce->delete();

        return redirect('/admin/gestion-annonces')->with('success', 'Annonce deleted!!');
    }

    public function deleteAnnonceSyndic($id)
    {
        $annonce = Annonces::find($id);
        $annonce->delete();

        return redirect('/syndic/gestion-annonces-syndic')->with('success', 'Annonce syndic deleted!!');
    }
}
