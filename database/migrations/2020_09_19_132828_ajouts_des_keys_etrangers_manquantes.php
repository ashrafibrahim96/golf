<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutsDesKeysEtrangersManquantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parties', function (Blueprint $table) {

            $table->integer('parcour_id')->unsigned()->nullable() ;
            $table->foreign('parcour_id')->references('id')->on('parcours') ;

        });

        Schema::table('scores', function (Blueprint $table) {

            $table->integer('trou_id')->unsigned()->nullable() ;
            $table->foreign('trou_id')->references('id')->on('trous') ;

        });
        Schema::table('score_unitaires', function (Blueprint $table) {

            $table->integer('drive_id')->unsigned()->nullable() ;
            $table->foreign('drive_id')->references('id')->on('drives') ;

        });

        Schema::table('score_unitaires', function (Blueprint $table) {

            $table->integer('save_id')->unsigned()->nullable() ;
            $table->foreign('save_id')->references('id')->on('saves') ;

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
