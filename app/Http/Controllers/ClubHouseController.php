<?php

namespace App\Http\Controllers;

use App\ClubHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubhouses = ClubHouse::latest()->paginate(5);

        return view('dashboard.clubhouse',compact('clubhouses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createclubhouse');

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
            'nom' => 'required',
            'GPS' => 'required',
        ]);
        ClubHouse::create($request->all());
        return redirect('/clubhouse')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClubHouse  $clubHouse
     * @return \Illuminate\Http\Response
     */
    public function show(ClubHouse $clubhouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClubHouse  $clubHouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubhouse =ClubHouse::find($id);
        return view('dashboard.edithouse',compact('clubhouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClubHouse  $clubHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $clubhouse =ClubHouse::find($id);

        $request->validate([
            'nom' => 'required',
            'GPS' => 'required',
        ]);
        $clubhouse->update($request->all());
        $clubhouse -> save();
        return redirect('/clubhouse')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClubHouse  $clubHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubHouse $clubhouse)
    {
        //$clubHouse =ClubHouse::find($id);
        //$clubHouse = new ClubHouse();
        //$clubHouse::find($id);
        $clubhouse->delete();
        return redirect('/clubhouse')->with('success','user deleted successfully');
    }
}
