<?php

namespace App\Http\Controllers\contenu_sac;

use App\Model\Contenu_Sac\Balle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balles = Balle::latest()->paginate(5);

        return view('dashboard.equipments.balles.balle',compact('balles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('dashboard.equipments.balles.createballe');

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
            'marque' => 'required',
            'photo' => 'required',
        ]);
        Balle::create($request->all());
        return redirect('/equipment/balle')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenu_Sac\Balle  $balle
     * @return \Illuminate\Http\Response
     */
    public function show(Balle $balle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenu_Sac\Balle  $balle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balle =Balle::find($id);
        return view('dashboard.equipments.balles.editballe',compact('balle'));
    }
    public function update(Request $request, $id)
    {
        $balle =Balle::find($id);

        $request->validate([
            'marque' => 'required',
            'photo' => 'required',
        ]);
        $balle->update($request->all());
        $balle -> save();
        return redirect('/equipment/balle')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenu_Sac\Balle  $balle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balle $balle)
    {
        $balle->delete();
        return redirect('/equipment/balle')->with('success','user deleted successfully');
    }
}
