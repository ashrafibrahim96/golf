<?php

namespace App\Model\Score ;

use App\Model\Parcour;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    protected $fillable = [
        'nombre_joueurs' , 'date' , 'parcour_id' , 'nombre_trous' , 'type'
    ];
    public function parcour()
    {
        return $this->belongsTo(Parcour::Class,'parcour_id');
    }
}
