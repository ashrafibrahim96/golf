<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'texte' , 'titre' , 'photo'
    ];
}
