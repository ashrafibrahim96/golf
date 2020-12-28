<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;


class Reservation extends Model
{
    protected $fillable =[
        'match_id' , 'date_matche' , 'user_id'
    ];


    /**
     * Reservation constructor.
     * @param Request $request
     */
    /*
    public function __construct(Request $request)
    {
        $this->match_id = $request->match_id ;
        $this->date_matche = $request->date_matche ;
    }
*/

    public function match(){
        return $this->belongsTo(Match::class,'match_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function __construct(Request $request)
    {
        $this->match_id = $request->match_id ;
        $this->date_matche = $request->date_matche ;
    }

}
