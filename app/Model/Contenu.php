<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    protected $table = 'contenu';

    protected $fillable = [
        'titre', 'content'
    ];

    protected $hidden = [];
}
