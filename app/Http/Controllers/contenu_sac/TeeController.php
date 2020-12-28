<?php

namespace App\Http\Controllers\contenu_sac;

use App\Model\Contenu_Sac\Tee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tees = Tee::latest()->paginate(5);

        return view('dashboard.equipments.tees.tee',compact('tees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('dashboard.equipments.tees.createtee');

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
            'hauteur' => 'required',
        ]);
        Tee::create($request->all());
        return redirect('/equipment/tee')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenu_Sac\Tee  $tee
     * @return \Illuminate\Http\Response
     */
    public function show(Tee $tee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenu_Sac\Tee  $tee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tee =Tee::find($id);
        return view('dashboard.equipments.tees.edittee',compact('tee'));
    }
    public function update(Request $request,$id)
    {
        $tee =Tee::find($id);

        $request->validate([
            'marque' => 'required',
            'photo' => 'required',
            'hauteur' => 'required',
        ]);
        $tee->update($request->all());
        $tee -> save();
        return redirect('/equipment/tee')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenu_Sac\Tee  $tee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tee $tee)
    {
        $tee->delete();
        return redirect('/equipment/tee')->with('success','user deleted successfully');
    }
}
