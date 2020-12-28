<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$affectationss = Affectation::with('user');
        $affectations = DB::table('user_partie')->get();
        return view('dashboard.parties.showaffectation',compact('affectations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_partie=DB::table('parties')->orderBy('id','desc')->first();
        $users=User::all('id','name');
        //$id_user=User::all(['id','name']);
        return view(('dashboard.parties.affectation'),compact('id_partie','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('user_partie')->insert(
            $request->validate([
                'user_id' => 'required',
                'partie_id' => 'required',
            ])
        );
        return redirect('affectation')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $affectation =Affectation::find($id);
       return view('dashboard.parties.editaffectation',compact('affectation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $affectation =Affectation::find($id);

        $request->validate([
            'user_id' => 'required',
            'partie_id' => 'required',
        ]);
        $affectation->update($request->all());
        $affectation -> save();
        return redirect('/affectation')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user_partie')->where('id', '=', $id)->delete();
        return redirect('/affectation')->with('success','user deleted successfully');
    }
}
