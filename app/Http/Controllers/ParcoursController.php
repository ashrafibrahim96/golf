<?php

namespace App\Http\Controllers;

use App\Model\Parcour;
use Illuminate\Http\Request;

class ParcoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcours = Parcour::latest()->paginate(5);

        return view('dashboard.parcours',compact('parcours'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createparcour');

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
            'nombre_de_trous' => 'required',
            'clubHouse_id' => 'required',

        ]);
        Parcour::create($request->all());
        return redirect('/parcour')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parcour  $parcour
     * @return \Illuminate\Http\Response
     */
    public function show(Parcour $parcour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parcour  $parcour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parcour =Parcour::find($id);
        return view('dashboard.editparcour',compact('parcour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parcour  $parcour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $parcour =Parcour::find($id);

        $request->validate([
            'nom' => 'required',
            'nombre_de_trous' => 'required',
            'clubHouse_id' => 'required',
        ]);
        $parcour->update($request->all());
        $parcour -> save();
        return redirect('/parcour')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parcour  $parcour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcour $parcour)
    {
        $parcour->delete();
        return redirect('/parcour')->with('success','user deleted successfully');

    }
}
