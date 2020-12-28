<?php

namespace App\Http\Controllers;

use App\Model\Sac;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class SacController
 * @package App\Http\Controllers
 */
class SacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function show(Sac $sac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function edit(Sac $sac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sac $sac)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sac  $sac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sac $sac)
    {
        //
    }


    /**
     * @param Request $request
     * En cas le baton existe
     * @bodyParam baton_id int required The id of the baton. Example : 9
     *@response  {
    "message": [
    "baton existant"
    ]
    }
     *
     *@response  {
    "message": [
    "sucess"
    ]
    }
     */
    public function ajout_baton_au_sac(Request $request) {
        $user_id = Auth::id();
        $sac_id = DB::table('users')->where('id' , $user_id)->value('sac_id');
        $baton_id = $request->baton_id ;
        $baton_existant = DB::table('sac_baton')->where('baton_id', $baton_id)->where('sac_id' , $sac_id)->value('id');
        if ($baton_existant > 0) {
             return response()->json(
                ['message'=>['baton existant'] ,
                ] ) ;

        }
        else {
            DB::beginTransaction();
            DB::insert('insert into sac_baton (sac_id, baton_id) values (?, ?)', [$sac_id , $baton_id]);
            DB::commit();
            return response()->json(
                ['message'=>['ajout du baton avec succes'] ,
                ] ) ;

        }


    }


    /**
     * @return JsonResponse
     *@response  {
    "batons": [
    [
    {
    "id": 13,
    "marque": null,
    "photo": null,
    "nom": "sandwedge",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ],
    [
    {
    "id": 11,
    "marque": null,
    "photo": null,
    "nom": "fer9",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ],
    [
    {
    "id": 10,
    "marque": null,
    "photo": null,
    "nom": "fer7",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ],
    [
    {
    "id": 9,
    "marque": null,
    "photo": null,
    "nom": "fer5",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ],
    [
    {
    "id": 8,
    "marque": null,
    "photo": null,
    "nom": "putter",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ],
    [
    {
    "id": 12,
    "marque": null,
    "photo": null,
    "nom": "hybride",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    }
    ]
    ],
    "balles": [
    [
    {
    "id": 1,
    "marque": "balle",
    "photo": null,
    "created_at": null,
    "updated_at": null
    }
    ]
    ]
    }
     *
     */
    public function voir_sac() {
        $user_id = Auth::id();
        $sac_id = DB::table('users')->where('id' , $user_id)->value('sac_id');
        $batons = DB::table('sac_baton')->where('sac_id' , $sac_id)->get();

        // collecter les ID des batons du User
        $tableaux_id = [] ;
        foreach ($batons as $baton) {
            array_push($tableaux_id , $baton->baton_id) ;
        }

        // collecter les caracterisitiques des batons
        $tableaux_baton = [] ;

        foreach ($tableaux_id as $baton_id) {
            $t = DB::table('batons')->where('id' , $baton_id)->get();
            array_push($tableaux_baton , $t) ;
        }


        // collecter les donnes des balles
        $tableaux_balle = [] ;
        $balle = DB::table('balles')->where('marque' , 'balle')->get();
        array_push($tableaux_balle , $balle) ;


        return response()->json(['batons'=> $tableaux_baton , 'balles' =>$tableaux_balle ]) ;

    }

    /**
     * @param Request $request
     * @bodyParam baton_id int required The id of the baton. Example : 9
    /**
     *@response  {
    "message": [
    "baton inexistant"
    ]
    }
     *
     *@response  {
    "message": [
    "sucess"
    ]
    }
     */


    public function supprimer_baton_du_sac(Request $request) {

        $request->validate([
            'baton_id'=>['required'] ,
        ]) ;
        $user_id = Auth::id();
        $sac_id = DB::table('users')->where('id' , $user_id)->value('sac_id');

        $baton_id = $request->get('baton_id') ;


        $baton_existant = DB::table('sac_baton')->where('baton_id', $baton_id)->where('sac_id' , $sac_id)->value('id');
        if ($baton_existant == null) {
            return response()->json(
                ['message'=>'baton inexistant' ,
                ] ) ;

        }
        else {
            DB::beginTransaction();
            DB::table('sac_baton')->where('baton_id', $baton_id)->where('sac_id' , $sac_id)->delete();
            DB::commit();
            return \response()->json(
                ['message' => ['sucess']
                ]
            ) ;
        }
    }

    /**
     * @param Request $request
     * @bodyParam baton_id1 int required The id of the baton. Example : 1
     * @bodyParam baton_id2 int required The id of the baton. Example : 1
     * @bodyParam baton_id3 int required The id of the baton. Example : 1
     * @bodyParam baton_id4 int required The id of the baton. Example : 1
     * @bodyParam baton_id5 int required The id of the baton. Example : 1
     * @bodyParam baton_id6 int required The id of the baton. Example : 1
     * @bodyParam baton_id7 int required The id of the baton. Example : 1
     * @bodyParam baton_id8 int required The id of the baton. Example : 1
     * @bodyParam baton_id9 int required The id of the baton. Example : 1
     * @bodyParam baton_id10 int required The id of the baton. Example : 1
     * @bodyParam baton_id11 int required The id of the baton. Example : 1
     * @bodyParam baton_id12 int required The id of the baton. Example : 1
     * @bodyParam baton_id13 int required The id of the baton. Example : 1
     * @bodyParam baton_id14 int required The id of the baton. Example : 1
     *@response{
    "message": "sucess"
    }
     *
     *
     *
     *
     * @return JsonResponse
     */
    public function modifier_sac(Request $request) {
        $request->validate([
            'baton_id1'=>['required'] ,
            'baton_id2'=>['required'] ,
            'baton_id3'=>['required'] ,
            'baton_id4'=>['required'] ,
            'baton_id5'=>['required'] ,
            'baton_id6'=>['required'] ,
            'baton_id7'=>['required'] ,
            'baton_id8'=>['required'] ,
            'baton_id9'=>['required'] ,
            'baton_id10'=>['required'] ,
            'baton_id11'=>['required'] ,
            'baton_id12'=>['required'] ,
            'baton_id13'=>['required'] ,
            'baton_id14'=>['required'] ,
        ]) ;
        $sac_id = Auth::user()->sac_id ;
        DB::beginTransaction();
        DB::table('sac_baton')->where('sac_id', $sac_id)->delete();
        for ($i = 1; $i <= 14; $i++) {
            $nom  = 'baton_id'.$i ;
            if ($request->$nom > 0) {
                DB::insert('insert into sac_baton (sac_id, baton_id) values (?, ?)', [$sac_id,$request->$nom]);
            }
        }
        DB::commit();
        return response()->json(
            ['message'=>'sucess' ]
        ) ;



    }
}
