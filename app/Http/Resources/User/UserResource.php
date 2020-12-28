<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
            $depart = DB::table('departs')->where('id', $this[0]->depart_id)->value('couleur');

        return  [
            'name' =>$this[0]->name ,
            'email' =>$this[0]->email ,
            'dateDeNaissance' =>$this[0]->dateDeNaissance ,
            'sexe' =>$this[0]->sexe ,
            'handicap' =>$this[0]->handicap ,
            'depart ' => $depart  ,
            'photo'=>$this[0]->photo ,
        ];
    }
}
