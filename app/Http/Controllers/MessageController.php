<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->paginate(5);

        return view('dashboard.messages',compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @bodyParam user_id int required The id of the user. Example : 9
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>['required'] ,
            'email'=>['required' , 'email' ] ,
            'texte'=>['required'] ,
        ]) ;
        $message = new  Message() ;
        $message->nom = $request->nom ;
        $message->texte = $request->texte ;
        $message->email = $request->email ;
        $message->save() ;
        return  response()->json(
            ['message'=>'sucess'
            ]
        ) ;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect('/message')->with('success','user deleted successfully');
    }
}
