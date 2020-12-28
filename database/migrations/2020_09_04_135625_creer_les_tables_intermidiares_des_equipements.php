<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreerLesTablesIntermidiaresDesEquipements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sac_baton', function (Blueprint $table) {
            $table->id();
            $table->integer('sac_id')->unsigned()->nullable() ;
            $table->foreign('sac_id')->references('id')->on('sacs') ;
            $table->integer('baton_id')->unsigned()->nullable() ;
            $table->foreign('baton_id')->references('id')->on('batons') ;

        });

        Schema::create('sac_tee', function (Blueprint $table) {
            $table->id();
            $table->integer('sac_id')->unsigned()->nullable() ;
            $table->foreign('sac_id')->references('id')->on('sacs') ;
            $table->integer('tee_id')->unsigned()->nullable() ;
            $table->foreign('tee_id')->references('id')->on('tees') ;

        });

        Schema::create('sac_balle', function (Blueprint $table) {
            $table->id();
            $table->integer('sac_id')->unsigned()->nullable() ;
            $table->foreign('sac_id')->references('id')->on('sacs') ;
            $table->integer('balle_id')->unsigned()->nullable() ;
            $table->foreign('balle_id')->references('id')->on('balles') ;

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
