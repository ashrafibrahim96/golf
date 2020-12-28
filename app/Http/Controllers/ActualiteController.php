<?php

namespace App\Http\Controllers;

use App\Model\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * ActualiteController constructor.
     */
    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return  response()->json([
            'message'=>'sucess' ,
            'data' => Actualite::all()
        ]) ;
    }

    public function displayAll()
    {
        $actualites = Actualite::latest()->paginate(5);

        return view('dashboard.actualites',compact('actualites'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createactualite');

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
            'titre' => 'required',
            'texte' => 'required',
            'photo' => 'required',
        ]);
        Actualite::create($request->all());
        return redirect('actualites')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function show(Actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualites =Actualite::find($id);
        return view('dashboard.editactualite',compact('actualites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $actualites =Actualite::find($id);

        $request->validate([
            'titre' => 'required',
            'texte' => 'required',
            'photo' => 'required',
        ]);
        $actualites->update($request->all());
        $actualites -> save();
        return redirect('/actualites')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actualite $actualite)
    {
        $actualite->delete();
        return redirect('/actualites')->with('success','user deleted successfully');
    }
}
