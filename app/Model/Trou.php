<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trou extends Model
{
    protected $fillable = [
        'numero' , 'par' , 'strokeIndex' , 'distance_trou_blanc' ,
        'distance_trou_bleu' , 'distance_trou_rouge' , 'distance_trou_jaune' , 'GPS' , 'image2D' , 'parcour_id'
    ];
    public function parcour()
    {
        return $this->belongsTo(Parcour::class,'parcour_id');
    }
}
