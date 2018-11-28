<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'name_indonnesie'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
