<?php

namespace App\Http\Controllers\ClientAuth;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Validation\ValidationException;
use Psy\Util\Json;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request) {
        $request->validate([
            'email' => ['required' , 'email'] ,
            'password'=>['required']
        ]) ;
        $user = User::where('email' , $request->email)->first();

        if(!$user || !Hash::check($request->password , $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['the provided credentials are incorrect']
            ]) ;


        }
        return response()->json(
            ['message'=>'sucess' ,
             'token'  => $user->createToken('Auth Token')->accessToken ]
        ) ;



    }

    public  function logout(Request $request) {
        $request->user()->tokens()->delete() ;
        return response()->json(
            ['message'=>'sucess' ]
        ) ;
    }
}
