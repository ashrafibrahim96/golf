<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutDesAttributsALaTableEtEfface extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('user_partie', function (Blueprint $table) {
            $table->float('Eagle_pourcentage')->nullable()->default(0) ;
            $table->float('TrippleBogey_pourcentage')->nullable()->default(0) ;
        });

        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->dropColumn('Eagle_pourcentage');
            $table->dropColumn('Tripple Bogey_pourcentage');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
