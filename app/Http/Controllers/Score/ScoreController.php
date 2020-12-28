<?php

namespace App\Http\Controllers\Score;


use App\Model\Score\Score;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
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
     * @param  \App\Score  $modelScore
     * @return \Illuminate\Http\Response
     */
    public function show(Score $modelScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $modelScore
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $modelScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $modelScore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $modelScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $modelScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $modelScore)
    {
        //
    }

    /**
     *@param Request $request
     *@bodyParam partie_id int required The id of the partie. Example : 1
     *@bodyParam trou_id int required The id of the trou. Example : 1
     *@response {
    "message": "sucess"
    }
     */
    public function jouer_trou(Request $request) {
        $user_id = Auth::id() ;
        $request->validate([
            'trou_id'=>['required'] ,
            'partie_id'=>['required'] ,
        ]) ;
        $trou_id=$request->trou_id ;
        $partie_id =$request->partie_id ;

        $score = new Score() ;
        $score->valeur = 0 ;
        $score->trou_id= $trou_id ;
        $score->user_id=$user_id ;
        $score->partie_id = $partie_id ;
        $score->save() ;
        $score_id = $score->id ;
        return response()->json(
            ['message'=>'sucess' ,
            'score_id'=>$score_id]
        ) ;
    }



    /**
     *@param Request $request
     *@bodyParam score_id int required The id of the score. Example : 2
     *@response {
    "data": [
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 17,
    "type": "Double Bogey"
    }
    ]
    ],
    "score_id": "8"
    }
     * @return JsonResponse
     */
    public function voir_score_apres_trou(Request $request) {
        $request->validate([
            'score_id'=>['required'] ,
        ]) ;
        $score_id = $request->score_id ;

        //Calcul des valeurs

        $valeur = DB::table('score_unitaires')
            ->where('score_id', $score_id)
            ->count() ;



        $penalties = DB::table('score_unitaires')
            ->where('score_id', $score_id)
            ->where('penalties' , true )
            ->count() ;


        $valeur_finale=$valeur+$penalties ;


        //insertion du valeur du coup
        DB::table('scores')->where( 'id' , $score_id  )
            ->update(['valeur' => $valeur_finale])  ;

        //definition du methode du jeu

        $trou_id = DB::table('scores')
            ->where('id', $score_id)->value('trou_id') ;
        $par = DB::table('trous')
            ->where('id', $trou_id)->value('par') ;



        if ($par == 5){

            switch ($valeur_finale) {
                case 1:
                    $type= 'Hole In One' ;
                    break;
                case 2:
                    $type= 'Albatros' ;
                    break;
                case 3:
                    $type= 'Eagle' ;
                    break;
                case 4:
                    $type= 'Birdie' ;
                    break;
                case 5:
                    $type= 'Par' ;
                    break;
                case 6:
                    $type= 'Bogey' ;
                    break;
                case 7:
                    $type= 'Double Bogey' ;
                    break;
                case 8:
                    $type= 'Tripple Bogey' ;
                    break;
                default:
                    $type= 'rien' ;
            }

        }
        elseif ($par ==4){
            switch ($valeur_finale) {
                case 1:
                    $type= 'Hole In One' ;
                    break;
                case 2:
                    $type= 'Eagle' ;
                    break;
                case 3:
                    $type= 'Birdie' ;
                    break;
                case 4:
                    $type= 'Par' ;
                    break;
                case 5:
                    $type= 'Bogey' ;
                    break;
                case 6:
                    $type= 'Double Bogey' ;
                    break;
                case 7:
                    $type= 'Tripple Bogey' ;
                    break;
                default:
                    $type= 'rien' ;

            }
        }

        else {
            switch ($valeur_finale) {
                case 1:
                    $type= 'Hole In One' ;
                    break;
                case 2:
                    $type= 'Birdie' ;
                    break;
                case 3:
                    $type= 'Par' ;
                    break;
                case 4:
                    $type= 'Bogey' ;
                    break;
                case 5:
                    $type= 'Double Bogey' ;
                    break;
                case 6:
                    $type= 'Tripple Bogey' ;
                    break;
                default:
                    $type= 'rien' ;

            }
        }

        DB::table('scores')->where( 'id' , $score_id  )
            ->update(['type' => $type])  ;

        // affichage de score


        $partie_id = DB::table('scores')
            ->where( 'id' , $request->score_id )
            ->value('partie_id') ;
        $trou_id = DB::table('scores')
            ->where( 'id' , $request->score_id )
            ->value('trou_id') ;
        $users_table =  DB::table('scores')
            ->where( 'partie_id' , $partie_id )
            ->where( 'trou_id' , $trou_id )
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->get() ;
        $resultat = [] ;
        foreach ($users_table as $user) {
            $u = [] ;
            array_push($u , ['nom' => $user->name ,'photo' => $user->photo ,'sexe' => $user->sexe,'valeur' => $user->valeur, 'type' => $user->type]) ;
            array_push($resultat , $u) ;
        }

        return response()->json(
            ['data'=> $resultat ,
              'score_id'=>$score_id
                ]
        ) ;

    }

    /**
     *@param Request $request
     *@bodyParam score_id int required The id of the score. Example : 2
     *@response {
    {
    "data": [
    [
    1,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    },
    {
    "nom": "sqdsdqsdqsd",
    "photo": null,
    "valeur": 0
    },
    {
    "nom": "sqdsdqsdqsd",
    "photo": null,
    "valeur": 15
    },
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    2,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    },
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    },
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 3
    },
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    3,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 1
    }
    ]
    ],
    [
    4,
    []
    ],
    [
    5,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    6,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    7,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    8,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    9,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    10,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    11,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    12,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    13,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    14,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    15,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    16,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    17,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ],
    [
    18,
    [
    {
    "nom": "howhow",
    "photo": null,
    "valeur": 0
    }
    ]
    ]
    ]
    }
     * @return JsonResponse
     */
    public function voir_score_apres_match(Request $request) {
        $request->validate([
            'partie_id'=>['required'] ,
        ]) ;
        $partie_id=$request->partie_id;

        $nombre_trous = DB::table('parties')
            ->where( 'id' , $partie_id )
            ->value('nombre_trous') ;

        $resultat = [] ;

        $joueurs=DB::table('user_partie')
        ->where('partie_id',$partie_id)
        ->join('users','users.id','=','user_partie.user_id')
        ->get();

        foreach ($joueurs as $joueur) {
          $score=array_fill(1,$nombre_trous,0);

          for ($i=1; $i<=$nombre_trous; $i++){
            $trou_id=$i;
            $scores_table = DB::table('scores')
              ->where('partie_id',$partie_id)
              ->where('trou_id',$trou_id)
              ->where('user_id',$joueur->id)
              ->get();
            foreach ($scores_table as $score_t) {
                $score[$trou_id]= $score_t->valeur;
            }
          }
          array_push($resultat,['nom' => $joueur->name ,'photo' => $joueur->photo ,'sexe'=> $joueur ->sexe ,'score' =>$score]);
        }

        return response()->json(
            ['data'=> $resultat ]
        ) ;









    }


}
