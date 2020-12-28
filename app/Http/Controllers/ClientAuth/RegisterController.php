<?php

namespace App\Http\Controllers\ClientAuth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Model\Sac;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Integer;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name'=>['required'] ,
            'email'=>['required' , 'email' , 'unique:users'] ,
            'password'=>['required' , "min:8" ] ,
            'sexe'=>['required',  ] ,
            'telephone'=>['required' , 'integer'] ,
            'dateDeNaissance'=>['required']

        ]) ;



        //selection du boite a tee

        if ($request->sexe == 'homme') {
            $depart = 'Jaune' ;
        }
        else {
            $depart='Rouge' ;
        }


        $depart_id = DB::table('departs')->where('couleur', $depart)->value('id');

        DB::beginTransaction();

        //creation du sac de golf
        $sac = new Sac() ;
        $sac->save() ;

        // create user
        $user =  User::create([
            'name' =>$request->name ,
            'email' =>$request->email ,
            'password' => Hash::make($request->password) ,
            'sexe' =>$request->sexe ,
            'telephone' =>$request->telephone ,
            'dateDeNaissance' =>$request->dateDeNaissance ,
            'depart_id' => $depart_id ,
            'handicap'=> 36 ,
            'sac_id' => $sac->id ,
        ]);



        // remplissage initial de sac de golf
        $sac->remplissage_initial() ;
        DB::commit();

        return response()->json(
            ['message'=>'sucess' ,
               'data' => $user
            ]
        ) ;
    }
}
