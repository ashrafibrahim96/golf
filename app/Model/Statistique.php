<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    protected $fillable = [
        'user_id' , 'fairway' , 'gir' , 'puts' , 'ss', 'diving_accuracy' ,'sandSaves', 'greens_in_regulation' ,'putting_average'
    ];
}
