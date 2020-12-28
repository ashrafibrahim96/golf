<?php

namespace App\Http\Controllers;

use App\Model\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class LocationController
 * @package App\Http\Controllers
 */
class LocationController extends Controller
{
    /**
     * Voir locations disponibles .
     * @response {
    "message": "sucess",
    "data": [
    {
    "id": 1,
    "nom": "caddy",
    "tarif": "60",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 2,
    "nom": "sac",
    "tarif": "20",
    "created_at": null,
    "updated_at": null
    }
    ]
    }
     * @return JsonResponse
     */
    public function index()
    {
        return  response()->json([
            'message'=>'sucess' ,
            'data' => Location::all()
        ]) ;

    }
    public function displayAll()
    {
        $tarifs = Location::latest()->paginate(5);

        return view('dashboard.tarif.tarif',compact('tarifs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('dashboard.tarif.createtarif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'tarif' => 'required',
        ]);
        Location::create($request->all());
        return redirect('tarif')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return void
     */
    public function edit($id)
    {
        $tarif =Location::find($id);
        return view('dashboard.tarif.edittarif',compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Location $location
     * @return void
     */
    public function update(Request $request, $id)
    {
        $tarifs =Location::find($id);

        $request->validate([
            'nom' => 'required',
            'tarif' => 'required',
        ]);
        $tarifs->update($request->all());
        $tarifs -> save();
        return redirect('/tarif')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Location $location
     * @return void
     */
    public function destroy(Location $tarif)
    {
        $tarif->delete();
        return redirect('/tarif')->with('success','user deleted successfully');

    }


    /**
     * @param Request $request
     * @bodyParam location_id int required The id of the location. Example : 1
     * @bodyParam reservation_id int required The id of the reservation. Example : 1
     * @response {
    "message": ["sucess"]
    }
     * @response {
    "message": ["location existant"
    ]}
     * @return JsonResponse
     */
    public function ajouter_location_au_panier(Request $request) {
        $request->validate([
            'location_id'=>['required'] ,
            'reservation_id' =>['required ']
        ]) ;
        $location_id = $request->get('location_id') ;
        $reservation_id = $request->get('reservation_id') ;

        //ajout de location au panier de reservation
        $location_existant = DB::table('location_reservation')->where('location_id', $location_id)->where('reservation_id' , $reservation_id)->value('id');
        if ($location_existant > 0) {
            return response()->json(
                ['message'=>'location existant' ,
                ] ) ;

        }
        else{
            DB::beginTransaction();
            DB::insert('insert into location_reservation (location_id, reservation_id) values (?, ?)', [$location_id, $reservation_id]);
            DB::commit();

            return \response()->json(
                ['message' => 'sucess'
                ]
            ) ;
        }



    }

    /**
     * @param Request $request
     * @bodyParam location_id int required The id of the location. Example : 1
     * @bodyParam reservation_id int required The id of the reservation. Example : 1
     * @response {
    "message": "sucess"
    }
     * @response {
    "message": "location déja supprimé"
    }
     * @return JsonResponse
     *
     *
     */

    public function supprimer_location_du_panier(Request $request) {
        $request->validate([
            'location_id'=>['required'] ,
            'reservation_id' =>['required ']
        ]) ;
        $location_id = $request->get('location_id') ;
        $reservation_id = $request->get('reservation_id') ;

        $location_existant = DB::table('location_reservation')->where('location_id', $location_id)->where('reservation_id' , $reservation_id)->value('id');
        if ($location_existant == null) {
            return response()->json(
                ['message'=>'location déja supprimé' ,
                ] ) ;

        }
        else {
            DB::beginTransaction();
            DB::table('location_reservation')->where('reservation_id', $reservation_id)->where('location_id', $location_id)->delete();
            DB::commit();
            return \response()->json(
                ['message' => 'sucess'
                ]
            ) ;
        }





    }

    /**
     * @param Request $request
     * @bodyParam reservation_id int required The id of the reservation. Example : 1
     *@response{
    "message": "sucess",
    "data": [
    {
    "id": 1,
    "reservation_id": 2,
    "location_id": 1,
    "created_at": null,
    "updated_at": null,
    "nom": "Caddy",
    "tarif": "30"
    },
    {
    "id": 2,
    "reservation_id": 2,
    "location_id": 2,
    "created_at": null,
    "updated_at": null,
    "nom": "Série Complète Callaways",
    "tarif": "50"
    }
    ],
    "date_matche": "2020-10-15 12:00:00",
    "match": [
    {
    "nom": "18 trous",
    "tarif": "155"
    }
    ]
    }
     *@response {
    "message": "pas de reservation",
    }
     * @return JsonResponse
     */
    public function check_reservation(Request $request) {
        $user_id = Auth::id() ;
        $reservation = DB::table('reservations')
            ->where('user_id' , $user_id)
            ->orderBy('created_at', 'desc')->first();

        if($reservation == null) {
            return response()->json(
                [   'message'=>'pas de reservation' ,
                ] ) ;

        }
        else {
            $reservation_id = $reservation->id ;
            $liste_location = DB::table('location_reservation')
                ->join('locations', 'location_reservation.location_id', '=', 'locations.id')
                ->where('reservation_id' , $reservation_id)
                ->get();
            $date = DB::table('reservations')
                ->where('id', $reservation_id)
                ->value('date_matche') ;
            $match = DB::table('reservations')
                ->where('reservations.id', $reservation_id)
                ->join('matches', 'reservations.match_id', '=', 'matches.id')
                ->select(['nom' , 'tarif'])
                ->get();


            return response()->json(
                [   'message'=>'sucess' ,
                    'data'=>$liste_location ,
                    'date_matche'=>$date ,
                    'match'=> $match,
                    'reservation_id'=>$reservation_id
                ] ) ;
        }

    }
}
