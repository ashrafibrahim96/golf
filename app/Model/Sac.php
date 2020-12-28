<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sac extends Model
{

    protected $fillable = [
       'nombre_batons'
    ];

    /**
     * Sac constructor.
     * @param string[] $fillable
     */
    public function __construct( )
    {
         $this->nombre_batons = 7 ;
         $this->capacité = 14 ;

    }


    public function remplissage_initial() {
        $sac_id = $this->id ;
        $batons =['Sand Wedge' , 'Fer 9' , 'Fer 7' , 'Fer 5' , 'Putter' , 'Hybrid' , 'Driver' , 'Bois 3' ]  ;

        $balle_id = DB::table('balles')->where('marque', 'balle')->value('id');
        foreach ($batons as $baton){
            $baton_id = DB::table('batons')->where('nom', $baton)->value('id');
            DB::beginTransaction();
            DB::insert('insert into sac_baton (sac_id, baton_id) values (?, ?)', [$sac_id, $baton_id]);
            DB::commit();
        } ;
        DB::beginTransaction();
        DB::insert('insert into sac_balle (sac_id, balle_id) values (?, ?)', [$sac_id, $balle_id]);
        DB::commit();

    }
}
