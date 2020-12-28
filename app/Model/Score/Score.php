<?php

namespace App\Model\Score ;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'valeur' , 'user_id' , 'partie_id' , 'trou_id'
    ];
}
