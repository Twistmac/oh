<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnoncesResource;
use App\Model\Annonces;
use App\Model\Annonces_syndic;
use App\Model\Coms_annonce;
use App\Model\Likes;
use App\Model\Likes_syndics;
use App\Model\Membres;
use App\Model\Syndics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $data = $this->validate($request, [
            'categorie_id' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'age' => 'required',
        ]);
        $data['type'] = 's';
        $data['genre'] = '';
        $data['syndic_id'] = Auth::user()->id;
        $image = $request->file('image');
        if($image == null)
        {
            $data['image'] = 'vide-image.png';
        }
        else{
            $data['image'] = time().'_annonce.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/annonces/');
            $image->move($destinationPath, $data['image']);
        }

        $last = Annonces_syndic::create($data);

        if($last)
        {
            return redirect('/syndic/gestion-annonces-syndic')->with('success', 'New Annonce syndic added');
        }
    }



    public function annoncesJson($type,$user_id,$syndic_id)
    {
        $result = Annonces::where('syndic_id',$syndic_id)->get();

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
            'result' => $data,
            //'essai'=>$result
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
         $annonce->id_partenaire = (int) $data->id_partenaire;
        $annonce->syndic_id = (int) $data->syndic_id;

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

    //ajout annonce sans image
    public function saveAnnonceJsonNotImage(Request $request){
        $input = $request->getContent();

        $data = $data = json_decode($input,true);

        $annonce = new Annonces();

        $annonce->titre = $data['titre'];
        $annonce->description = $data['description'];
        $annonce->prix = $data['prix'];
        $annonce->categorie_id = $data['categorie'];
        $annonce->type = $data['type'];
        $annonce->user_id = $data['id_User'];
        $annonce->id_partenaire = $data['id_partenaire'];
        $annonce->syndic_id = $data['syndic_id'];

        $annonce->image = '';
        $annonce->save();
        $result['result'] = 'ok';

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

    //annonce des syndics
    public function annonceSyndic($id_user){
        $membre = Membres::where('id',$id_user)->get();
        foreach ($membre as $membres){
            $id_syndic = $membres->syndic_id;
        }
        $likes = new Likes_syndics();
        $coms = new Coms_annonce();
        $annonces = Annonces_syndic::where('syndic_id',$id_syndic)->get();
        $nb_like = [];
        foreach ($annonces as $item){
            $nb_like[] = $likes->nbr_like($item->id);
            $nb_coms[] = $coms->nbr_coms($item->id);
            $etat_like[] = $likes->etatLike($item->id, $id_user);
        }

        for($i=0; $i<sizeof($nb_like);$i++){
            $annonces[$i]->like = $nb_like[$i];
            $annonces[$i]->nb_com = $nb_coms[$i];
            $annonces[$i]->etat_like = $etat_like[$i];
        }


        return response()->json(array(
            'result' => $annonces
        ));
    }

    //get annonce syndic by id
    public function getAnnonceSyndic($id_annonce,$id_user){
        $annonces = Annonces_syndic::join('residence','residence.syndic_id','=','annonces_syndic.syndic_id')
                                        ->where('id',$id_annonce)->get();
        $likes = new Likes_syndics();
        $coms = new Coms_annonce();
        foreach ($annonces as $item){
            $nb_like[] = $likes->nbr_like($item->id);
            $nb_coms[] = $coms->nbr_coms($item->id);
        }
        for($i=0; $i<sizeof($nb_like);$i++){
            $annonces[$i]->like = $nb_like[$i];
            $annonces[$i]->nb_com = $nb_coms[$i];
            $annonces[$i]->etat_like = $likes->etatLike($id_annonce,$id_user);
        }
        return response()->json(array(
            'result' => $annonces
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
        $annonce = Annonces_syndic::find($id);
        $annonce->delete();

        return redirect('/syndic/gestion-annonces-syndic')->with('success', 'Annonce syndic deleted!!');
    }

    //afficher les commentaire d'un annonce syndic
    public function showComs($id_annonce){
        $coms = Coms_annonce::where('id_annonce',$id_annonce)
                            ->join('membres','membres.id', '=', 'coms_annonce.id_membre')->get();
        return response()->json(array(
            'result' => $coms
        ));
    }

    public function postComs($id_annonce, $id_user, Request $request){
        $annonce_id = request()->id_annonce;
        $user_id = request()->id_user;

        $coms = $request->getContent();
        $data = json_decode($coms,true);


        $c = Coms_annonce::create(array('id_annonce'=> $annonce_id,
                                    'id_membre'=> $user_id,
                                    'commentaire'=> $data['commentaire']));

        if($c){
            return response()->json(array(
                'reponse'=> true,
                'commentaire'=> $data['commentaire']
            ));
        }
        else{
            return response()->json(array(
                'reponse'=> 'false'
            ));
        }

    }

    //annonce partenaire appli
    public function annoncePartenaire($categorie_id, $syndic_id){
        $annonce = Annonces::where('categorie_id', $categorie_id)
                            ->where('syndic_id', $syndic_id)
                            ->get();

        return response()->json(array(
                'result'=> $annonce
            ));                    
    }

    //annonce syndic dans compte partenaire
    public function annonceSyndicPartenaire($categorie_id, $syndic_id){
        $annonce = Annonces_syndic::where('categorie_id', $categorie_id)
                            ->where('syndic_id', $syndic_id)
                            ->get();

        return response()->json(array(
                'result'=> $annonce
            ));                    
    }


}
