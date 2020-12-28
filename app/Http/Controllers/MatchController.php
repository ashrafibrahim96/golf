<?php

namespace App\Http\Controllers;

use App\Model\Location;
use App\Model\Match;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *@response [
    * {
    * "id": 1,
    * "nom": "9 trous",
    * "tarif": "100",
    * "created_at": null,
    * "updated_at": null
    * },
    * {
    * "id": 2,
    * "nom": "18 trous",
    * "tarif": "155",
    * "created_at": null,
    * "updated_at": null
     * }
     * ]
     * @return Match[]|Collection|Response
     */
    public function index()
    {
        return Match::all() ;
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
     * @param  \App\Model\Match  $match
     * @return Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Match  $match
     * @return Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Match  $match
     * @return Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Match  $match
     * @return Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
