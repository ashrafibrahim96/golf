<?php

namespace App\Http\Controllers;

use App\Model\Statistique;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id =$request->input('user_id');
        //$user =  User::find($id);
        $id = $_GET['user_id'];
        $statistique =Statistique::find($id);
        //$statistiques = Statistique::all();
        //return view('dashboard.showuser', compact('statistiques'));
        //$statistiques = DB::table('statistiques')->where('user_id',$id)->get();
        return view('dashboard.showuser', compact('statistiques'));
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
     * @param  \App\Statistique  $modelStatistique
     * @return \Illuminate\Http\Response
     */
    public function show(Statistique $modelStatistique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistique  $modelStatistique
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistique $modelStatistique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistique  $modelStatistique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistique $modelStatistique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistique  $modelStatistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistique $modelStatistique)
    {
        //
    }

    /**
     * @param Request $request
     *@bodyParam partie_id int required The id of the partie. Example : 1
     *@response {
    "message": "sucess"
    }
     * @return JsonResponse
     */
    public function calculer_statistiques(Request $request) {
        $user_id = Auth::id() ;
        $request->validate([
            'partie_id'=>['required'] ,
        ]) ;
        $partie_id = $request->partie_id ;
        $nombre_frappes_totales = DB::table('scores')
            ->where('user_id' , $user_id)
            ->get()
            ->sum('valeur');


        $nombre_frappes_derniere_partie = DB::table('scores')
            ->where('user_id' , $user_id)
            ->where('partie_id' , $partie_id)
            ->get()
            ->sum('valeur');

        $nombre_de_trous =DB::table('parties')
            ->where('id' , $partie_id)
            ->value('nombre_trous') ;


        $fairway= DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->get()
            ->where('user_id' , $user_id)
            ->where('methode_id' , 1 )
            ->where('baton_id' , 7 )
            ->where('index_coup' , 1 )
            ->count() ;
        $nombre_de_frappes_fairway = $fairway / $nombre_de_trous ;

        $nombre_de_putts = DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->get()
            ->where('user_id' , $user_id)
            ->where('baton_id' , 1 )
            ->count() ;

        if ($nombre_frappes_totales==0) {
            $putting_average = 0 ;
        }
        else {
            $putting_average = $nombre_de_putts /$nombre_frappes_totales ;
        }




        $nombre_de_gir = DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->join('trous', 'scores.trou_id', '=', 'trous.id')
            ->whereColumn('score_unitaires.index_coup', '<' ,'trous.par_gir')
            ->where('user_id' , $user_id)
            ->where('methode_id' , 3 )
            ->where('balle_marque' , 1 )
            ->get()
            ->count() ;









        $nombre_de_sandSaves = DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->get()
            ->where('user_id' , $user_id)
            ->where('sandSave' , true )
            ->count() ;



        $driving_accuracy_nombre =  $fairway * 255 ;

        $Hole_in_one_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Hole In One')
            ->get()
            ->count() ;

        $Birdie_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Birdie')
            ->get()
            ->count() ;

        $Albatros_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Albatros')
            ->get()
            ->count() ;
        $Double_bogey_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Double Bogey')
            ->get()
            ->count() ;
        $Bogey_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Bogey')
            ->get()
            ->count() ;
        $Par_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Par')
            ->get()
            ->count() ;

        $TrippleBogey_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Tripple Bogey')
            ->get()
            ->count() ;

        $Eagle_pourcentage_last_partie = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->where( 'type' , 'Eagle')
            ->get()
            ->count() ;


        $h = DB::table('scores')
            ->where( 'partie_id' , $partie_id)
            ->where( 'user_id' , $user_id)
            ->get()
            ->sum('valeur');

        if ($nombre_de_trous == 18) {
            $handicap = 72 - $h ;
        }
        else {
            $handicap = 36 - $h ;
        }

        if ($nombre_frappes_totales == 0) {
            $driving_accuracy_nombre = 0;
            $nombre_de_frappes_fairway = 0 ;
            $ss = 0;
            $gir = 0 ;
            $nombre_de_putts = 0 ;
            $sandSaves = 0 ;
            $putting_average = 0 ;
            $nombre_de_gir = 0 ;
            $nombre_de_sandSaves=0 ;
        }
        else {
            $gir = $nombre_de_gir / $nombre_de_trous ;



            $ss = $nombre_de_sandSaves / $nombre_frappes_totales ;
        }

        $stat_id = DB::table('statistiques')
            ->where('user_id' , $user_id)
            ->value('id') ;





        if ($stat_id>0) {

            DB::table('statistiques')->where( 'id' , $stat_id  )
                ->update(['fairway' =>$nombre_de_frappes_fairway
                    , 'diving_accuracy' =>$driving_accuracy_nombre
                    ,'puts' => $nombre_de_putts
                    ,'ss' => $ss
                    ,'sandSaves' => $nombre_de_sandSaves
                    ,'putting_average' => $putting_average
                    ,'gir' => $gir
                ])  ;

        }
        else {
            DB::beginTransaction();
            $stat = new  Statistique() ;
            $stat->fairway = $nombre_de_frappes_fairway ;
            $stat->diving_accuracy = $driving_accuracy_nombre ;
            $stat->gir = $gir ;
            $stat->puts = $nombre_de_putts;
            $stat->ss = $ss ;
            $stat->sandSaves = $nombre_de_sandSaves ;
            $stat->user_id = $user_id ;
            $stat->putting_average = $putting_average ;
            $stat->greens_in_regulation = $gir*100;
            $stat->save() ;
        }




        if ($nombre_frappes_derniere_partie == 0) {
            DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )
                ->where( 'user_id' , $user_id  )
                ->update(['birdie_pourcentage' =>0
                    , 'par_pourcentage' =>0
                    ,'holeInOne_pourcentage' => 0
                    ,'DoubleBogey_pourcentage' => 0
                    ,'Bogey_pourcentage' => 0
                    ,'albatros_pourcentage' => 0
                    ,'Eagle_pourcentage' => 0
                    ,'TrippleBogey_pourcentage' => 0
                    ,'handicap' =>$handicap
                ])  ;
        }
        else {

            DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )
                ->where( 'user_id' , $user_id  )
                ->update(['birdie_pourcentage' =>($Birdie_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'par_pourcentage' =>($Par_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'holeInOne_pourcentage' => ($Hole_in_one_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'DoubleBogey_pourcentage' => ($Double_bogey_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'Bogey_pourcentage' => ($Bogey_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'TrippleBogey_pourcentage' => ($TrippleBogey_pourcentage_last_partie/$nombre_de_trous)*100
                    ,'handicap' =>$handicap
                ])  ;

            if ($nombre_de_trous == 18 ) {
                DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )
                    ->where( 'user_id' , $user_id  )
                    ->update([
                        'albatros_pourcentage' => ($Albatros_pourcentage_last_partie/4)*100
                        ,'Eagle_pourcentage' => ($Eagle_pourcentage_last_partie/9)*100

                    ])  ;
            }

            else{
                DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )
                    ->where( 'user_id' , $user_id  )
                    ->update([
                        'albatros_pourcentage' => ($Albatros_pourcentage_last_partie/2)*100
                        ,'Eagle_pourcentage' => ($Eagle_pourcentage_last_partie/4.5)*100

                    ])  ;
            }
        }






        DB::commit();

        return response()->json(
            ['message'=>'sucess' ]
        ) ;

    }

    /**
     * @param Request $request
     *@response {
    "Fairway": "25",
    "Gir": "23",
    "Puts": "65",
    "SS": "47",
    "sandSaves": "66",
    "greens_in_regulation": "0",
    "putting_average": "0",
    "driving_accuracy": "44"
    }
     * @return JsonResponse
     */
    public function afficher_statistiques_generales(Request $request) {
        $user_id = Auth::id() ;
        $fairway = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('fairway') ;
        $gir = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('gir') ;
        $ss = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('ss') ;
        $puts = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('puts') ;
        $diving_accuracy = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('diving_accuracy') ;
        $sandSaves = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('sandSaves') ;
        $greens_in_regulation = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('greens_in_regulation') ;
        $putting_average = DB::table('statistiques')
            ->where( 'user_id' , $user_id)->
            value('putting_average') ;

        return response()->json(
            [   'Fairway'=>$fairway ,
                'Gir'=>$gir ,
                'Puts'=>$puts ,
                'SS'=>$ss ,
                'sandSaves'=>$sandSaves ,
                'greens_in_regulation'=>$greens_in_regulation ,
                'putting_average'=>$putting_average ,
                'driving_accuracy'=>$diving_accuracy ,
            ]
        ) ;





    }

    /**
     * @param Request $request
     *@response {
    "data": [
    {
    "partie_id": 1,
    "birdie_pourcentage": "0",
    "par_pourcentage": "0",
    "holeInOne_pourcentage": "0",
    "Bogey_pourcentage": "0",
    "albatros_pourcentage": "0",
    "TrippleBogey_pourcentage": "33.333333333333",
    "Eagle_pourcentage": "0"
    },
    {
    "partie_id": 2,
    "birdie_pourcentage": "0",
    "par_pourcentage": "0",
    "holeInOne_pourcentage": "0",
    "Bogey_pourcentage": "0",
    "albatros_pourcentage": "0",
    "TrippleBogey_pourcentage": "0",
    "Eagle_pourcentage": "0"
    },
    {
    "partie_id": 3,
    "birdie_pourcentage": "0",
    "par_pourcentage": "0",
    "holeInOne_pourcentage": "0",
    "Bogey_pourcentage": "0",
    "albatros_pourcentage": "0",
    "TrippleBogey_pourcentage": "0",
    "Eagle_pourcentage": "0"
    } ,
    {
    "partie_id": 4,
    "birdie_pourcentage": "0",
    "par_pourcentage": "0",
    "holeInOne_pourcentage": "0",
    "Bogey_pourcentage": "0",
    "albatros_pourcentage": "0",
    "TrippleBogey_pourcentage": "33.333333333333",
    "Eagle_pourcentage": "0"
    },
    ]
    }
     * @return JsonResponse
     */
    public function afficher_statistiques_par_match(Request $request) {
        $user_id = Auth::id() ;
        $pourcentage = DB::table('user_partie')
            ->where( 'user_id' , $user_id)
            ->take(4)
            ->select(['partie_id', 'handicap' , 'birdie_pourcentage' ,'par_pourcentage' ,
                'holeInOne_pourcentage' , 'Bogey_pourcentage' , 'albatros_pourcentage' ,
                'TrippleBogey_pourcentage' ,
                'Eagle_pourcentage' ])
            ->get();
        return response()->json(
            [   'data' => $pourcentage
            ] ) ;
    }

    /**
     * @param Request $request
     * @response {
    "data": [
    {
    "baton_id": 1,
    "count": 5
    },
    {
    "baton_id": 5,
    "count": 5
    },
    {
    "baton_id": 6,
    "count": 3
    },
    {
    "baton_id": 4,
    "count": 1
    },
    {
    "baton_id": 8,
    "count": 1
    }
    ],
    "nombre frappes": 15
    }
     * @return JsonResponse
     */
    public function voir_most_played_club(Request $request) {
        $user_id = Auth::id() ;


        $a = DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->where('user_id' , $user_id)
            ->selectRaw('baton_id, COUNT(*) as count')
            ->groupBy('baton_id')
            ->orderBy('count', 'desc')
            ->get() ;

         $nombre_frappes_totales = DB::table('scores')
            ->join('score_unitaires', 'scores.id', '=', 'score_unitaires.score_id')
            ->get()
            ->where('user_id' , $user_id)
            ->count() ;

        return response()->json(
            [   'data' => $a ,
                'nombre frappes' => $nombre_frappes_totales
            ] ) ;


    }
}
