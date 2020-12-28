<?php

namespace App\Model\Contenu_sac;

use Illuminate\Database\Eloquent\Model;

abstract class Equipement extends Model
{
    protected $fillable = [
        'marque' , 'photo'
    ];
}
