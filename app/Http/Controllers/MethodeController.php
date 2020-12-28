<?php

namespace App\Http\Controllers;

use App\Model\Methode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MethodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @response{
    "data": [
    {
    "id": 1,
    "nom": "Fairway",
    "created_at": "2020-09-22 11:44:15",
    "updated_at": null
    },
    {
    "id": 2,
    "nom": "Bunker",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 3,
    "nom": "Green",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 4,
    "nom": "Obstacle d'eau",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 5,
    "nom": "Rough",
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 6,
    "nom": "Hors Limite",
    "created_at": null,
    "updated_at": null
    }
    ]
    }
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = DB::table('methodes')->get();
        return response()->json(
            [   'data' => $data ,
            ] ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Methode  $methode
     * @return Response
     */
    public function show(Methode $methode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Methode  $methode
     * @return Response
     */
    public function edit(Methode $methode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Methode  $methode
     * @return Response
     */
    public function update(Request $request, Methode $methode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Methode  $methode
     * @return Response
     */
    public function destroy(Methode $methode)
    {
        //
    }
}
