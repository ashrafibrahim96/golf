<?php

namespace App\Model\Contenu_Sac;

use Illuminate\Database\Eloquent\Model;

class Tee extends Equipement
{
    protected $fillable = [
        'marque' , 'photo','hauteur'
    ];
}
