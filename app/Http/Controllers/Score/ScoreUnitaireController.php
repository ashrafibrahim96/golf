<?php

namespace App\Http\Controllers\Score;

use App\Model\Score\Score;
use App\Model\Score\ScoreUnitaire;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoreUnitaireController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoreUnitaire  $modelScoreUnitaire
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreUnitaire $modelScoreUnitaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoreUnitaire  $modelScoreUnitaire
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreUnitaire $modelScoreUnitaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoreUnitaire  $modelScoreUnitaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoreUnitaire $modelScoreUnitaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoreUnitaire  $modelScoreUnitaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreUnitaire $modelScoreUnitaire)
    {
        //
    }

    /**
     *@param Request $request
     *@bodyParam baton_id int required The id of the baton. Example : 1
     *@bodyParam methode_id int required The id of the methode. Example : 1
     *@bodyParam score_id int required The id of the score. Example : 1
     *@bodyParam balle_marque int required The balle is cored or not. Example : 0
     *@bodyParam penalties boolean required There is a penaltie or not. Example : true
     *@bodyParam sandSave boolean required the balle is sand save or not. Example : true
     *@response{
    "message": "passe au trou suivant"
    }
     *@response {
    "message": "jouer un autre coup",
    "numéro du coup": 16
    }
     *
     * @return JsonResponse
     */
    public function jouer_coup(Request $request) {
        $user_id = Auth::id() ;
        $request->validate([
            'score_id'=>['required'] ,
            'baton_id'=>['required'] ,
            'methode_id'=>['required'] ,
            'balle_marque'=>['required'] ,
            'penalties'=>['required'] ,
            'sandSave'=>['required'] ,
        ]) ;
        $baton_id=$request->baton_id ;
        $methode_id=$request->methode_id ;
        $score_id =$request->score_id ;
        $balle_marque=$request->balle_marque ;
        $penalties=$request->penalties ;
        $sandSave=$request->sandSave ;

        $n =  DB::table('score_unitaires')
            ->where('score_id', $score_id)
            ->count() ;

        $pena = DB::table('score_unitaires')
            ->where('score_id', $score_id)
            ->where('penalties', true)
            ->count() ;

        $index_coup = $n+$pena+1 ;


        //remplir carasteristiques du coup
        $scoreUnitaire = new ScoreUnitaire() ;

        $scoreUnitaire->baton_id= $baton_id ;
        $scoreUnitaire->score_id= $score_id ;
        $scoreUnitaire->methode_id= $methode_id ;
        $scoreUnitaire->balle_marque= $balle_marque ;
        $scoreUnitaire->penalties= $penalties ;
        $scoreUnitaire->sandSave= $sandSave ;
        $scoreUnitaire->index_coup=$index_coup ;
        $scoreUnitaire->save() ;



        if($balle_marque == 1){

            return response()->json(
                [ 'message'=>'passe au trou suivant',
                    'data'=> $scoreUnitaire
                ]
            ) ;
        }
        else {
            return response()->json(
                [ 'message'=>'jouer un autre coup' ,
                    'numéro du coup' => $index_coup,
                    'data'=> $scoreUnitaire
                ]

            ) ;
        }
    }

    /**
     * @param Request $request
     *@bodyParam baton_id int required The id of the baton. Example : 1
     *@bodyParam methode_id int required The id of the methode. Example : 1
     *@bodyParam scoreUnitaire_id int required The id of the score. Example : 1
     *@bodyParam balle_marque int required The balle is cored or not. Example : 0
     *@bodyParam penalties boolean required There is a penaltie or not. Example : true
     *@bodyParam sandSave boolean required the balle is sand save or not. Example : true
     *@response{
    "message": "sucess"
    }
     * @return JsonResponse
     */
    public function update_coup(Request $request) {
        $request->validate([
            'scoreUnitaire_id'=>['required'] ,
            'baton_id'=>['required'] ,
            'methode_id'=>['required'] ,
            'balle_marque'=>['required'] ,
            'penalties'=>['required'] ,
            'sandSave'=>['required'] ,
        ]) ;
        DB::beginTransaction();

        DB::table('score_unitaires')->where( 'id' , $request->scoreUnitaire_id  )
            ->update(['baton_id' =>$request->baton_id
                , 'methode_id' =>$request->methode_id
                ,'balle_marque' => $request->balle_marque
                ,'penalties' => $request->penalties
                ,'sandSave' => $request->sandSave
            ])  ;
        DB::commit();

        if($request->balle_marque == 1){

            return response()->json(
                [ 'message'=>'passe au trou suivant'
                ]
            ) ;
        }
        else {
            return response()->json(
                [ 'message'=>'jouer un autre coup']
            ) ;
        }


    }




}
