<?php

namespace App\Http\Controllers;

use App\Model\Appartement;
use App\Model\Immeuble;
use App\Model\Residence;
use App\Model\Residents;
use App\Model\Syndics;
use Illuminate\Http\Request;
use Spreadsheet_Excel_Reader;

class ResidenceController extends Controller
{
    public function deleteResidence($id, $syndic_id)
    {
        $residence = Residence::where('syndic_id',$syndic_id);
        $user = Syndics::where('id',$syndic_id);
        $user->delete();
        $immeuble = Immeuble::where('id_residence', $id);
        $appartement = Appartement::where('id_residence', $id);
        $resident= Residents::where('syndic_id', $syndic_id);
        $appartement->delete();
        $immeuble->delete();
        $residence->delete();
        $resident->delete();

        return redirect('/admin/gestion-residences')->with('success', 'Residence deleted!!');
    }

    public function editResidence(Request $request, $id)
    {
        if($request->isMethod('post'))
        {
            $residence = Residence::where('id_residence',$id);

            $residence->nom = $request->nom;
            $residence->numero = $request->numero;
            $residence->nom_ref = $request->nom_ref;
            $residence->prenom_ref = $request->prenom_ref;
            $residence->email = $request->email;
            $residence->adresse = $request->adresse;
            $residence->code_postal = $request->code_postal;
            $residence->ville = $request->ville;
            $residence->tel = $request->tel;
            $residence->nb_partenaire = $request->nb_partenaire;
            $residence->nb_immeuble = $request->nb_immeuble;

            if($residence->save())
            {
                return redirect('/syndic/details-residence/'.$id)->with('success', 'Residence updated');
            }
        }
    }
	
	//importation de fichier résidence 
	public function import(){
		if (Input::hasFile('excelcsv')) {

				$residencesArray = array();
				$residences = Residence::get();
				foreach ($residences as $residence) {
					$residencesArray[$residence->numero] = $residence->nom;
				}

				/*$sectionsArray = array();
				$sections = sections::get();
				foreach ($sections as $section) {
					$sectionsArray[$section->classId][$section->id] = $section->sectionName." - ".$section->sectionTitle;
				}*/

			  if ( $_FILES['excelcsv']['tmp_name'] )
			  {
				  $data = new Spreadsheet_Excel_Reader();
				  $data->setOutputEncoding('CP1251');
				  $readExcel = $data->read( $_FILES['excelcsv']['tmp_name']);

  		  		  if(!is_array($readExcel)){
					  $readExcel = $data->sheets[0]['cells'];
				  }

				  $first_row = true;

				  $dataImport = array("ready"=>array(),"revise"=>array());
				  foreach ($readExcel as $row)
				  {
					  if ( !$first_row )
					  {
						  $importItem = array();
						  if(isset($row[1])){
							  $importItem['id'] = $row[1];
						  }
						  if(isset($row[2])){
							  $importItem['numero'] = $row[2];
						  }
						  if(isset($row[3])){
							  $importItem['nom'] = $row[3];
						  }
						  if(isset($row[4])){
							  $importItem['nom_ref'] = $row[4];
						  }
						  if(isset($row[5])){
							  $importItem['prenom_ref'] = $row[5];
						  }
						  if(isset($row[6])){
							  $importItem['email'] = $row[6];
						  }
						  if(isset($row[7])){
							  $importItem['adresse'] = $row[7];
						  }
						  if(isset($row[8])){
							  $importItem['code_postal'] = $row[8];
						  }
						  if(isset($row[9])){
							  $importItem['ville'] = $row[9];
						  }
						   if(isset($row[10])){
							  $importItem['tel'] = $row[10];
						  }
						  if(isset($row[11])){
							  $importItem['nb_partenaire'] = $row[11];
						  }
						  if(isset($row[12])){
							  $importItem['nb_immeuble'] = $row[12];
						  }
						  if(isset($row[13])){
							  $importItem['actif'] = $row[13];
						  }
						  if(isset($row[14])){
							  $importItem['created_at'] = $row[14];
						  }
						  if(isset($row[15])){
							  $importItem['updated_at'] = $row[15];
						  }
						  if(isset($row[16])){
							  $importItem['syndic_id'] = $row[16];
						  }
						  if(isset($row[17])){
							  $importItem['nb_motorbike'] = $row[17];
						  }
							
						$dataImport['ready'][] = $importItem;	
							
						/*  $checkUser = User::where('username',$importItem['username'])->orWhere('email',$importItem['email']);
						  if($checkUser->count() > 0){
							  $checkUser = $checkUser->first();
							  if($checkUser->username == $importItem['username']){
								  $importItem['error'][] = "username";
							  }
							  if($checkUser->email == $importItem['email']){
								  $importItem['error'][] = "email";
							  }
							  if(!isset($classArray[$importItem['class']])){
								  $importItem['error'][] = "class";
							  }
							  $dataImport['revise'][] = $importItem;
						  }else{
							  $dataImport['ready'][] = $importItem;
						  }*/

					  }
					  $first_row = false;
				  }

				  $toReturn = array();
				  $toReturn['dataImport'] = $dataImport;
				  //$toReturn['sections'] = $sectionsArray;

				  return $toReturn;
			  }
		}else{
			
		}
	
	}
	
	public function importresidences(){
		return view('admin/importresidences');
	}

	public function editNumAppartement(Request $request){
        $appartement = Appartement::where('id_appartement', $request->input('id_appart'));
        $check = $appartement->update(['num_appartement' =>  $request->input('num_appart')]);
        if($check){
            return redirect()->back()->with('success','Appartment update');
        }
    }

}
