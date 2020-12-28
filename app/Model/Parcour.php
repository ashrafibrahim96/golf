<?php

namespace App\Model;

use App\ClubHouse;
use Illuminate\Database\Eloquent\Model;

class Parcour extends Model
{
    protected $fillable = [
        'nombre_de_trous' , 'nom' , 'clubHouse_id'
    ];

    //public function partie()
  //  {
    //    return $this->hasMany(Partie::class);
   // }

    public function clubhouse()
      {
        return $this->belongsTo(ClubHouse::class,'clubHouse_id');
     }
}
