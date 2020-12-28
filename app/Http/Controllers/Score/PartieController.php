<?php

namespace App\Http\Controllers\Score;

use App\Affectation;
use App\Http\Controllers\AffectationController;
use App\Http\Resources\PartieResource;
use App\Http\Resources\User\UserResource;
use App\Model\Score\Partie;
use App\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties =Partie::latest()->paginate(5);
        //$parties->load('parcour');

        return view('dashboard.parties.partie',compact('parties'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.parties.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'nombre_joueurs' => 'required',
            'parcour_id' => 'required',
            'nombre_trous' => 'required',
            //'confirmed' => 'required',
        ]);
        //$id = $request->input('id');
        Partie::create($request->all());

        //$users->load('user');
        //return view(('dashboard.parties.affectation'),compact('id_partie','users'));
        //return redirect(route(affectation.create));
        return redirect()->action([AffectationController::class, 'create']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partie  $modelPartie
     * @return \Illuminate\Http\Response
     */
    public function show(Partie $modelPartie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partie  $modelPartie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partie =Partie::find($id);
        return view('dashboard.parties.edit',compact('partie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partie  $modelPartie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $parties =Partie::find($id);

        $request->validate([
            'date' => 'required',
            'nombre_joueurs' => 'required',
            'parcour_id' => 'required',
            'nombre_trous' => 'required',

        ]);
        $parties->update($request->all());
        $parties -> save();
        return redirect('/partie')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partie  $modelPartie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partie $partie)
    {
        $partie->delete();
        return redirect('/partie')->with('success','user deleted successfully');
    }

    /**
     * @param Request $request
     *@response {
    "message": "partie existant",
    "data": {
    "id": 1,
    "date": "2005-05-06 19:04:47",
    "nombre_joueurs": 3,
    "created_at": "2020-10-06 08:39:16",
    "updated_at": "2020-10-06 08:39:16",
    "parcour_id": null,
    "type": null,
    "nombre_trous": null,
    "confirmed": null
    }
    }
     * @response {
    "message": "pas de match"
    }
     * @return JsonResponse
     */
    public function  voir_derniere_partie (Request $request) {
        $user_id = Auth::id() ;
        $element =  DB::table('user_partie')->where( 'user_id' , $user_id  )->latest('created_at')->first();

        if ($element == null)  {
            return   response()->json([
                'message' => 'pas de match']) ;
        }
        else {
            $partie_id = $element->partie_id ;
            $partie = DB::table('parties')->where( 'id' , $partie_id)->get() ;
            $p = new PartieResource($partie) ;

            return   response()->json([
                'message' => 'partie existant' ,
                'data' => $partie
            ]) ;
        }



    }

    /**
     * @param Request $request
     * @bodyParam partie_id int required The id of the partie. Example : 1
     *@response {
    "message": "success",
    "data": [
    {
    "name": "Hadhamy Rjiba",
    "email": "hadhamirjiba@test.com",
    "dateDeNaissance": "2020-10-05",
    "sexe": "homme",
    "handicap": "12",
    "depart ": "Jaune",
    "photo": null
    },
    {
    "name": "Fedi Kouzana",
    "email": "fedikouzana@test.com",
    "dateDeNaissance": "2020-10-05",
    "sexe": "homme",
    "handicap": "36",
    "depart ": "Jaune",
    "photo": null
    },
    {
    "name": "Alaa Mzoughi",
    "email": "alaamzoughi@test.com",
    "dateDeNaissance": "2020-10-05",
    "sexe": "homme",
    "handicap": "36",
    "depart ": "Jaune",
    "photo": null
    },
    {
    "name": "howhowsdgdsgsdg",
    "email": "sqdsqscccqd@gmail.com",
    "dateDeNaissance": "1998-05-17",
    "sexe": "homme",
    "handicap": "36",
    "depart ": "Jaune",
    "photo": null
    }
    ]
    }
     * @return JsonResponse
     */
    public function voir_joueurs(Request $request) {

        $auth_id = Auth::id() ;

        $request->validate([
            'partie_id'=>['required']
        ]) ;
        $tab_user_id = [] ;
        $table_joueurs = DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )->get() ;

        foreach ($table_joueurs as $joueur) {
            array_push($tab_user_id , $joueur->user_id) ;
        }

        $users_tab = [] ;
        foreach ($tab_user_id as $id) {
            $user =  DB::table('users')->where( 'id' , $id  )->get() ;
            $user1 = new UserResource($user) ;
            array_push($users_tab , $user1 ) ;
        }


        return \response()->json([
            'message' => 'success' ,
            'data' => $users_tab]) ;
    }


    /**
     * @param Request $request
     * @bodyParam partie_id int required The id of the partie. Example : 1
     * @response {"message":"pret a lancer"}
     * @response {"message":"partie en attente"}
     * @return JsonResponse
     */
    public function  lancer_partie(Request $request) {
        $request->validate([
            'partie_id'=>['required']
        ]) ;
        $user_id = Auth::id() ;
        $partie =  DB::table('user_partie')->where( 'partie_id' , $request->partie_id  )
            ->where( 'user_id' , $user_id  )
            ->update(['confirmed_unitaire' => 'true'])  ;



        $confirmed_unitaire_tab=[] ;
        $partie_tab=DB::table('user_partie')->where( 'partie_id' , $request->partie_id )->get() ;

        //collection des confirmation unitaires
        foreach ($partie_tab as $c) {
            $conf = $c->confirmed_unitaire ;
            array_push($confirmed_unitaire_tab , $conf ) ;
        }



        //test des confirmation unitaires des joueurs
        $condition = true ;

        foreach ($confirmed_unitaire_tab as $c) {

            if ($c==false) {
                $condition = 'false' ;

            }

        }


        //en cas de confirmation total , la partie est confirmé
        if ($condition=='true') {
            $confirmed_global =  DB::table('parties')
                ->where( 'id' , $request->partie_id )
                ->update(['confirmed' => 'true'])  ;

            return \response()->json(['message' => 'pret a lancer ']) ;
        }


        else{
            return \response()->json(['message' => 'partie en attente ']) ;
        }

    }

    /**
     * @param Request $request
     * @bodyParam partie_id int required The id of the partie. Example : 1
     * @response {
    "data": [
    {
    "id": 1,
    "nom": "panorama",
    "nombre_de_trous": 18,
    "clubHouse_id": 1,
    "created_at": "2020-09-22 11:44:15",
    "updated_at": null
    }
    ]
    }
     * @return JsonResponse
     */
    public function voir_parcours(Request $request) {
        $request->validate([
            'partie_id'=>['required']
        ]) ;
        $parcour_id =   DB::table('parties')->where( 'id' , $request->partie_id)->value('parcour_id') ;
        $parcours =   DB::table('parcours')->where( 'id' , $parcour_id)->get() ;
        return \response()->json(['data' => $parcours]) ;

    }

    /**
     * @param Request $request
     * @bodyParam partie_id int required The id of the partie. Example : 1
     *@response  {
    "data": [
    {
    "id": 2,
    "numero": 796,
    "par": 7,
    "strokeIndex": 192663,
    "distance_trou_blanc": 10218387,
    "distance_trou_bleu": 9,
    "distance_trou_rouge": 644,
    "distance_trou_jaune": 32,
    "GPS": "1740",
    "image2D": "3",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:15",
    "updated_at": "2020-10-06 14:33:15"
    },
    {
    "id": 3,
    "numero": 637,
    "par": 233,
    "strokeIndex": 2,
    "distance_trou_blanc": 336691862,
    "distance_trou_bleu": 5229,
    "distance_trou_rouge": 723733561,
    "distance_trou_jaune": 560,
    "GPS": "781624013",
    "image2D": "50313",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:16",
    "updated_at": "2020-10-06 14:33:16"
    },
    {
    "id": 4,
    "numero": 979,
    "par": 43,
    "strokeIndex": 15241455,
    "distance_trou_blanc": 42,
    "distance_trou_bleu": 68903556,
    "distance_trou_rouge": 114631510,
    "distance_trou_jaune": 62197,
    "GPS": "1",
    "image2D": "525095315",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:16",
    "updated_at": "2020-10-06 14:33:16"
    },
    {
    "id": 5,
    "numero": 4262,
    "par": 3,
    "strokeIndex": 587508,
    "distance_trou_blanc": 15946682,
    "distance_trou_bleu": 44,
    "distance_trou_rouge": 2512641,
    "distance_trou_jaune": 6,
    "GPS": "4",
    "image2D": "4795051",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:16",
    "updated_at": "2020-10-06 14:33:16"
    },
    {
    "id": 6,
    "numero": 817,
    "par": 432,
    "strokeIndex": 33,
    "distance_trou_blanc": 3567,
    "distance_trou_bleu": 1238,
    "distance_trou_rouge": 46,
    "distance_trou_jaune": 9,
    "GPS": "3",
    "image2D": "4404",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:17",
    "updated_at": "2020-10-06 14:33:17"
    },
    {
    "id": 7,
    "numero": 674,
    "par": 17718,
    "strokeIndex": 876221101,
    "distance_trou_blanc": 427,
    "distance_trou_bleu": 2834670,
    "distance_trou_rouge": 671,
    "distance_trou_jaune": 3399,
    "GPS": "25495337",
    "image2D": "918",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:17",
    "updated_at": "2020-10-06 14:33:17"
    },
    {
    "id": 8,
    "numero": 4221306,
    "par": 7518110,
    "strokeIndex": 24510992,
    "distance_trou_blanc": 3520,
    "distance_trou_bleu": 8667,
    "distance_trou_rouge": 15401433,
    "distance_trou_jaune": 1438152,
    "GPS": "1148",
    "image2D": "2874189",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:17",
    "updated_at": "2020-10-06 14:33:17"
    },
    {
    "id": 9,
    "numero": 40994820,
    "par": 8690,
    "strokeIndex": 628509,
    "distance_trou_blanc": 15,
    "distance_trou_bleu": 77035,
    "distance_trou_rouge": 971216141,
    "distance_trou_jaune": 1294,
    "GPS": "6011806",
    "image2D": "132312235",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:17",
    "updated_at": "2020-10-06 14:33:17"
    },
    {
    "id": 10,
    "numero": 81267,
    "par": 6017564,
    "strokeIndex": 5695,
    "distance_trou_blanc": 26,
    "distance_trou_bleu": 109,
    "distance_trou_rouge": 2109,
    "distance_trou_jaune": 9,
    "GPS": "62824020",
    "image2D": "560083155",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:18",
    "updated_at": "2020-10-06 14:33:18"
    },
    {
    "id": 11,
    "numero": 799,
    "par": 6795,
    "strokeIndex": 14387,
    "distance_trou_blanc": 5100873,
    "distance_trou_bleu": 27557,
    "distance_trou_rouge": 42278,
    "distance_trou_jaune": 18,
    "GPS": "2723",
    "image2D": "15202744",
    "parcour_id": 1,
    "created_at": "2020-10-06 14:33:18",
    "updated_at": "2020-10-06 14:33:18"
    }
    ]
    }
     * @return JsonResponse
     */
    public function voir_trous(Request $request) {
        $request->validate([
            'partie_id'=>['required']
        ]) ;
        $parcour_id =   DB::table('parties')->where( 'id' , $request->partie_id)->value('parcour_id') ;
        $trous_array=   DB::table('trous')->where( 'parcour_id' , $parcour_id)->get() ;
        return \response()->json(['data' => $trous_array]) ;

    }

    /**
     * @param Request $request
     *@response[
    {
    "id": 1,
    "numero": 1,
    "par": 4,
    "strokeIndex": 12,
    "distance_trou_blanc": 364,
    "distance_trou_bleu": 344,
    "distance_trou_rouge": 394,
    "distance_trou_jaune": 328,
    "GPS": "Trou 1",
    "image2D": "trou1.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 2,
    "numero": 2,
    "par": 4,
    "strokeIndex": 8,
    "distance_trou_blanc": 388,
    "distance_trou_bleu": 366,
    "distance_trou_rouge": 313,
    "distance_trou_jaune": 346,
    "GPS": "Trou 2",
    "image2D": "trou2.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 3,
    "numero": 3,
    "par": 3,
    "strokeIndex": 18,
    "distance_trou_blanc": 157,
    "distance_trou_bleu": 142,
    "distance_trou_rouge": 97,
    "distance_trou_jaune": 132,
    "GPS": "Trou 3",
    "image2D": "trou3.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 2
    },
    {
    "id": 4,
    "numero": 4,
    "par": 4,
    "strokeIndex": 4,
    "distance_trou_blanc": 425,
    "distance_trou_bleu": 401,
    "distance_trou_rouge": 334,
    "distance_trou_jaune": 384,
    "GPS": "Trou 4",
    "image2D": "trou4.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 5,
    "numero": 5,
    "par": 5,
    "strokeIndex": 10,
    "distance_trou_blanc": 500,
    "distance_trou_bleu": 461,
    "distance_trou_rouge": 411,
    "distance_trou_jaune": 438,
    "GPS": "Trou 5",
    "image2D": "trou5.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 4
    },
    {
    "id": 6,
    "numero": 6,
    "par": 3,
    "strokeIndex": 6,
    "distance_trou_blanc": 141,
    "distance_trou_bleu": 130,
    "distance_trou_rouge": 100,
    "distance_trou_jaune": 111,
    "GPS": "Trou 6\n",
    "image2D": "trou6.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 2
    },
    {
    "id": 7,
    "numero": 7,
    "par": 4,
    "strokeIndex": 6,
    "distance_trou_blanc": 371,
    "distance_trou_bleu": 351,
    "distance_trou_rouge": 312,
    "distance_trou_jaune": 328,
    "GPS": "Trou 7",
    "image2D": "trou7.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 8,
    "numero": 8,
    "par": 4,
    "strokeIndex": 2,
    "distance_trou_blanc": 296,
    "distance_trou_bleu": 269,
    "distance_trou_rouge": 215,
    "distance_trou_jaune": 239,
    "GPS": "Trou 8",
    "image2D": "trou8.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 9,
    "numero": 9,
    "par": 5,
    "strokeIndex": 16,
    "distance_trou_blanc": 423,
    "distance_trou_bleu": 401,
    "distance_trou_rouge": 345,
    "distance_trou_jaune": 372,
    "GPS": "Trou 9",
    "image2D": "trou9.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 4
    },
    {
    "id": 10,
    "numero": 10,
    "par": 4,
    "strokeIndex": 17,
    "distance_trou_blanc": 292,
    "distance_trou_bleu": 273,
    "distance_trou_rouge": 242,
    "distance_trou_jaune": 251,
    "GPS": "Trou 10",
    "image2D": "trou10.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 11,
    "numero": 11,
    "par": 4,
    "strokeIndex": 15,
    "distance_trou_blanc": 324,
    "distance_trou_bleu": 301,
    "distance_trou_rouge": 249,
    "distance_trou_jaune": 385,
    "GPS": "Trou 11",
    "image2D": "trou11.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 12,
    "numero": 12,
    "par": 3,
    "strokeIndex": 7,
    "distance_trou_blanc": 166,
    "distance_trou_bleu": 140,
    "distance_trou_rouge": 102,
    "distance_trou_jaune": 113,
    "GPS": "Trou 12",
    "image2D": "trou12.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 2
    },
    {
    "id": 13,
    "numero": 13,
    "par": 4,
    "strokeIndex": 5,
    "distance_trou_blanc": 341,
    "distance_trou_bleu": 307,
    "distance_trou_rouge": 254,
    "distance_trou_jaune": 280,
    "GPS": "Trou 13\n",
    "image2D": "trou13.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 14,
    "numero": 14,
    "par": 4,
    "strokeIndex": 11,
    "distance_trou_blanc": 322,
    "distance_trou_bleu": 314,
    "distance_trou_rouge": 285,
    "distance_trou_jaune": 299,
    "GPS": "Trou 14",
    "image2D": "trou14.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 15,
    "numero": 15,
    "par": 3,
    "strokeIndex": 13,
    "distance_trou_blanc": 166,
    "distance_trou_bleu": 141,
    "distance_trou_rouge": 102,
    "distance_trou_jaune": 115,
    "GPS": "Trou 15",
    "image2D": "trou15.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 2
    },
    {
    "id": 16,
    "numero": 16,
    "par": 5,
    "strokeIndex": 1,
    "distance_trou_blanc": 480,
    "distance_trou_bleu": 445,
    "distance_trou_rouge": 389,
    "distance_trou_jaune": 412,
    "GPS": "Trou 16\n",
    "image2D": "trou16.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 4
    },
    {
    "id": 17,
    "numero": 17,
    "par": 4,
    "strokeIndex": 9,
    "distance_trou_blanc": 313,
    "distance_trou_bleu": 289,
    "distance_trou_rouge": 279,
    "distance_trou_jaune": 280,
    "GPS": "Trou 17",
    "image2D": "trou17.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 3
    },
    {
    "id": 18,
    "numero": 18,
    "par": 5,
    "strokeIndex": 3,
    "distance_trou_blanc": 576,
    "distance_trou_bleu": 555,
    "distance_trou_rouge": 474,
    "distance_trou_jaune": 510,
    "GPS": "Trou 18",
    "image2D": "trou18.png",
    "parcour_id": 1,
    "created_at": null,
    "updated_at": null,
    "par_gir": 4
    }
    ]
     * @return \Illuminate\Support\Collection
     */
    public function index_trous(Request $request) {
        return  DB::table('trous')->get() ;
    }
}
