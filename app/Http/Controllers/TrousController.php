<?php

namespace App\Http\Controllers;

use App\Model\Trou;
use Illuminate\Http\Request;

class TrousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trous = Trou::paginate(18);

        return view('dashboard.trous.trou',compact('trous'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.trous.create');

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
            'numero' => 'required',
            'par' => 'required',
            'strokeIndex' => 'required',
            'distance_trou_blanc' => 'required',
            'distance_trou_bleu' => 'required',
            'distance_trou_rouge' => 'required',
            'distance_trou_jaune' => 'required',
            'GPS' => 'required',
            'image2D' => 'required' ,
            'parcour_id' => 'required',
        ]);
        Trou::create($request->all());
        return redirect('trou')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Trou  $trou
     * @return \Illuminate\Http\Response
     */
    public function show(Trou $trou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Trou  $trou
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trous =Trou::find($id);
        return view('dashboard.trous.edit',compact('trous'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Trou  $trou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $trous =Trou::find($id);

        $request->validate([
            'numero' => 'required',
            'par' => 'required',
            'strokeIndex' => 'required',
            'distance_trou_blanc' => 'required',
            'distance_trou_bleu' => 'required',
            'distance_trou_rouge' => 'required',
            'distance_trou_jaune' => 'required',
            'GPS' => 'required',
            'image2D' => 'required',
            'parcour_id' => 'required',
        ]);
        $trous->update($request->all());
        $trous -> save();
        return redirect('/trou')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Trou  $trou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trou $trou)
    {
        $trou->delete();
        return redirect('/trou')->with('success','user deleted successfully');
    }
}
