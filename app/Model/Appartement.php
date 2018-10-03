<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 27/09/2018
 * Time: 16:39
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    public $table = 'appartement';
    public $fillable = ['id_immeuble','id_residence'];

}