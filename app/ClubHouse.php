<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubHouse extends Model
{
    protected $table="clubHouses";

    protected $fillable = [
        'nom' , 'GPS'
    ];
}
