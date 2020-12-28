<?php

namespace App\Http\Controllers\contenu_sac;

use App\Http\Controllers\ReservationController;
use App\Model\Contenu_Sac\Baton;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BatonController extends Controller
{
    /**
     *Display a listing of the resource.
     *@response{
    "data": [
    {
    "id": 1,
    "marque": "Putter",
    "photo": "putter.png",
    "nom": "Putter",
    "favori": null,
    "distance": null,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 2,
    "marque": "Wedge",
    "photo": "wedge.png",
    "nom": "Sand Wedge",
    "favori": null,
    "distance": 97,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 3,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 5",
    "favori": null,
    "distance": 175,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 4,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 7",
    "favori": null,
    "distance": 150,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 5,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 9",
    "favori": null,
    "distance": 130,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 6,
    "marque": "Hybrid",
    "photo": "hybrid.png",
    "nom": "Hybrid",
    "favori": null,
    "distance": 215,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 7,
    "marque": "Driver",
    "photo": "driver.png",
    "nom": "Driver",
    "favori": null,
    "distance": 255,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 8,
    "marque": "Bois",
    "photo": "bois.png",
    "nom": "Bois 3",
    "favori": null,
    "distance": 235,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 9,
    "marque": "Wedge",
    "photo": "wedge.png",
    "nom": "Pitch Wedge",
    "favori": null,
    "distance": 119,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 10,
    "marque": "Wedge",
    "photo": "wedge.png",
    "nom": "Gap Wedge",
    "favori": null,
    "distance": 108,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 11,
    "marque": "Wedge",
    "photo": "wedge.png",
    "nom": "Lob Wedge",
    "favori": null,
    "distance": 84,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 12,
    "marque": "Bois",
    "photo": "bois.png",
    "nom": "Bois 4",
    "favori": null,
    "distance": 220,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 13,
    "marque": "Bois",
    "photo": "bois.png",
    "nom": "Bois 2",
    "favori": null,
    "distance": 245,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 14,
    "marque": "Bois",
    "photo": "bois.png",
    "nom": "Bois 1",
    "favori": null,
    "distance": 255,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 15,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 2",
    "favori": null,
    "distance": 210,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 16,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 3",
    "favori": null,
    "distance": 195,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 17,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 4",
    "favori": null,
    "distance": 185,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 18,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 6",
    "favori": null,
    "distance": 160,
    "created_at": null,
    "updated_at": null
    },
    {
    "id": 19,
    "marque": "Fer",
    "photo": "fer.png",
    "nom": "Fer 8",
    "favori": null,
    "distance": 140,
    "created_at": null,
    "updated_at": null
    }
    ]
    }
     *@return JsonResponse
     */
    public function index()
    {
        return  response()->json([
            'data' => Baton::all()
        ]) ;
    }
    public function displayAll(){
        $batons = Baton::paginate(18);

        return view('dashboard.equipments.batons.baton',compact('batons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('dashboard.equipments.batons.createbaton');

    }
    public function add_to_db(Request $request){
        $request->validate([
            'marque' => 'required',
            'photo' => 'required',
            'nom' => 'required',
            'favori' => 'required',
            'distance' => 'required',
        ]);
        Baton::create($request->all());
        return redirect('/equipment/baton')
            ->with('success','Product created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = new Baton() ;
        $b->nom = $request->nom ;
        $b->marque = $request->marque ;
        $b->save() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenu_Sac\Baton  $baton
     * @return \Illuminate\Http\Response
     */
    public function show(Baton $baton)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenu_Sac\Baton  $baton
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baton =Baton::find($id);
        return view('dashboard.equipments.batons.editbaton',compact('baton'));
    }
    public function update(Request $request,$id)
    {
        $baton =Baton::find($id);

        $request->validate([
            'marque' => 'required',
            'photo' => 'required',
            'nom' => 'required',
            'favori' => 'required',
            'distance' => 'required',
        ]);
        $baton->update($request->all());
        $baton -> save();
        return redirect('/equipment/baton')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenu_Sac\Baton  $baton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baton $baton)
    {
        $baton->delete();
        return redirect('equipment/baton')->with('success','user deleted successfully');
    }
}
