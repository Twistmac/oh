<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'annonce_id', 'membre_id'
    ];

    protected $hidden = [

    ];

    public function like($data)
    {
        $this->id = null;
        $this->annonce_id = $data['annonce_id'];
        $this->membre_id = $data['membre_id'];
        $this->save();
    }
}