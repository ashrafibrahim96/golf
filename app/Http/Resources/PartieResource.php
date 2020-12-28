<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PartieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parcours = DB::table('parcours')->where('id', $this[0]->parcour_id)->value('nom');


        return  [
            'id'=>$this[0]->id ,
            'date' =>$this[0]->date ,
            'nombre_joueurs' =>$this[0]->nombre_joueurs ,
            'parcours'=> $parcours ,
            'type'=>$this[0]->type ,
            'nombre_trous' =>$this[0]->nombre_trous ,


        ];
    }
}
