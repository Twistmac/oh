<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 11/10/2018
 * Time: 11:18
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Module extends Model
{
    use Notifiable;
    protected $table = 'module';
    protected $fillable = ['numero_module', 'imei', 'numero_tel', 'pin'];


}