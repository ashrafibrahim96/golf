<?php

namespace App\Http\Controllers\Utilisateurs;

use App\Http\Resources\User\UserResource;
use App\Model\Statistique;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */


    /**
     * Display the specified resource.
     *@response{
    "message": "sucess",
    "data": {
    "name": "salahssss",
    "email": "tests1@gmail.com",
    "dateDeNaissance": "1998-05-17",
    "sexe": "femme",
    "handicap": "97",
    "depart ": "Jaune",
    "photo": null
    }
    }
     * @return JsonResponse
     */
    public function show()
    {
        $id = Auth::id() ;
        $user =  DB::table('users')->where( 'id' , $id  )->orderBy('id', 'desc')->get() ;
        $user1 = new UserResource($user) ;

        return response()->json(
            ['message'=>'sucess' ,
                'data' => $user1 ,
            ]
        ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\User  $user
     * @bodyParam name string The name of the user. Example : salah
     * @bodyParam sexe string The sexe of the partie. Example : homme
     * @bodyParam telephone int The telephone of the user. Example : 55 252 364
     * @bodyParam handicap int The handicap of the user. Example : 55
     * @bodyParam depart string The depart of the user. Example : Jaune
     * @response {
    "message": "sucess",
    "data": {
    "id": 51,
    "name": "salahssss",
    "email": "tests1@gmail.com",
    "email_verified_at": null,
    "created_at": "2020-10-14T10:17:55.000000Z",
    "updated_at": "2020-10-14T10:22:16.000000Z",
    "telephone": "25654787",
    "photo": null,
    "handicap": "97",
    "sexe": "femme",
    "dateDeNaissance": "1998-05-17",
    "depart_id": 1,
    "sac_id": 51
    }
    }
     * @return UserResource
     */
    public function modifierProfil(Request $request )
    {
        //validation
        $request->validate([
            'name'=>['string'] ,
            'sexe'=>['string'] ,
            'telephone'=>['integer'] ,
            'handicap'=>['integer']  ,

        ]) ;
        $user = Auth::user() ;
        $user_id = Auth::id() ;
        DB::beginTransaction();

        //modification de boite a tee
        if ($request->has('depart')) {
            $nom_depart = $request->depart ;
            $depart_id = DB::table('departs')->where('couleur', $nom_depart)->value('id');
            DB::table('users')->where( 'id' , $user_id  )
                ->update(['depart_id' =>$depart_id])  ;
        }

        if ($request->has('name')) {

            DB::table('users')->where( 'id' , $user_id  )
                ->update(['name' =>$request->name])  ;
        }

        if ($request->has('telephone')) {

            DB::table('users')->where( 'id' , $user_id  )
                ->update(['telephone' =>$request->telephone])  ;
        }

        if ($request->has('handicap')) {
            DB::table('users')->where( 'id' , $user_id  )
                ->update(['handicap' =>$request->handicap])  ;
        }
        DB::commit();

        return response()->json(
            ['message'=>'sucess' ,
                'data' => $user ,
            ]
        ) ;
    }
    public function modifierImage(Request $request ) {
        $user = Auth::user() ;
        if($request->hasFile('photo')) {
            $image = $request->file('photo') ;
            $file_name = time().'.'.$image->getClientOriginalExtension() ;
            $image->move("uploads/users/", $file_name) ;
            $user->photo = $file_name ;
            $user->save() ;
        }
        return response()->json(
          ['message'=>'success', 'data'=>$file_name]);
    }

    /* **************************** ADMIN Dashboard  **************************** */

    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('dashboard.user.users',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     public function display($user_id)
    {
        //$statistiques = Statistique::all();
        //$id = $_GET['user_id'];
        $user =User::find($user_id);
        $statistiques = DB::table('statistiques')->where('user_id',$user_id)->get();
        $matches = DB::table('user_partie')->where('user_id',$user_id)->get();

        //$statistiques = DB::table('statistiques')->where('user_id',$user_id)->get();

        return view('dashboard.user.showuser',compact('user','statistiques','matches'));
    }
    /*
    public function storeContact(Request $request){
        // validation goes here
        $user = User::create($request->all());
        return $user;
    } */

    public function Create(Request $request)
        //create new user from admin dashboard
    {
        return view('dashboard.user.createuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telephone' => 'required',
            'sexe' => 'required',
            'dateDeNaissance' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success','Product created successfully.');
    }
    public function getAllContacts(){
        $users = User::all();
        //if you want to get contacts on where condition use below code
        //$contacts = Contact::Where('tenant_id', "1")->get();
        return view('dashboard..user.users', compact('users'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        return view('dashboard.user.edituser',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user =User::find($id);

        $request->validate([
            'name' => 'required',
        ]);
        $user->update($request->all());
        $user -> save();
        return redirect('/users')->with('success','user updated successfully');
    }
    public function destroy(User $user,Statistique $statistique)
    {
        //$user=  DB::table('user_partie')->where('user_id', $user['user_id'])->delete();
        $user->delete();
        return redirect('/users')->with('success','user deleted successfully');
    }
}
