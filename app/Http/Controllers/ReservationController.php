<?php

namespace App\Http\Controllers;

use App\Model\Actualite;
use App\Model\Match;
use App\Model\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation=Reservation::latest()->paginate(5);
        //$reservation_id=Reservation::select('id')->get();
        $match=Match::select('id','nom')->get();

        //$locid = DB::table('location_reservation')->where('id','=', )->value('location_id');
        // $loc_id=DB::table('location_reservation')->where('id', '=', $id);
        //$locid = DB::table('location_reservation')
           // ->select('location_id')
           // ->join('locations', 'location_reservation.location_id', '=', 'locations.id') // hehdi nejbed beha tarif  w nom
            // ->join('reservations', 'location_reservation.reservation_id', '=', 'reservations.id')
            //->where('id' , '=','reservation_id')
           // ->get('location_id');

        $loc = DB::table('location_reservation')
            ->join('locations', 'location_reservation.location_id', '=', 'locations.id')
            ->join('reservations', 'location_reservation.reservation_id', '=', 'reservations.id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->get();
        //$mat = DB::table('reservations')
            //->join('matches', 'reservations.match_id', '=', 'matches.id')
            //->select('matches.nom as yyy', 'matches.tarif as xxx')
            //->where('reservation_id' , $reservation_id)
           // ->get();


        return view('dashboard.reservations.reservation',compact('loc','match','reservation'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/reservation')->with('success','user deleted successfully');
    }

    /**
     * @param Request $request
     * @bodyParam match_id int required The id of the match c est le nombre de trous avec le tarif . Example : 9
     * @bodyParam date_matche DateTime required The date of the match. Example : 2020-09-02 14:16:30
     * @response {
     * "message": "sucess",
     * "data": {
     * "match_id": "2",
     * "date_matche": "2020-09-02 14:16:30",
     * "user_id": 5,
     * "updated_at": "2020-10-06T09:19:54.000000Z",
     * "created_at": "2020-10-06T09:19:54.000000Z",
     * "id": 3
     * }
     * }
     * @return JsonResponse
     */
    public function creer_une_reservation(Request $request)
    {
        $request->validate([
            'match_id' => ['required'],
            'date_matche' => ['required'],
        ]);
        $reservation = new  Reservation($request);
        $reservation->user_id = Auth::id();
        $reservation->save();
        return \response()->json(
            ['message' => 'sucess',
                'data' => $reservation
            ]
        );
    }

    /**
     * @param Request $request
     * @bodyParam reseervation_id int required The id of the reservation . Example :9
     * @response {
    "message": "sucess"
    }
     * @response{
    "message": "reservation déja supprimé"
    }
     * @return JsonResponse
     */
    public function supprimer_la_reservation(Request $request) {
        $request->validate([
            'reservation_id' => ['required'],
        ]);
        $reservation_id = DB::table('reservations')
            ->where('id' , $request->reservation_id)->value('id');


        if ($reservation_id > 0) {
          DB::table('location_reservation')-> where ('reservation_id', $reservation_id)->delete();

            DB::table('reservations')
                ->where('id' , $reservation_id)->delete();
            return  response()->json(
                ['message'=>'sucess'
                ]
            ) ;
        }

        else {
            return  response()->json(
                ['message'=>'reservation déja supprimé'
                ]
            ) ;
        }
    }


}
