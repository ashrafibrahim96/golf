<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutDesColonnesAuScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scores', function (Blueprint $table) {
            $table->string('type')->nullable() ;
        });

        Schema::create('methodes', function (Blueprint $table) {
            $table->id();
            $table->string('nom') ;
            $table->timestamps();
        });

        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->dropColumn('drive_id');
            $table->dropColumn('save_id');
            $table->dropColumn('chips');
            $table->dropColumn('putts');
            $table->dropColumn('SandShots');
        });

        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->integer('methode_id')->unsigned()->nullable() ;
            $table->foreign('methode_id')->references('id')->on('methodes') ;
            $table->boolean('sandSave')->nullable() ;

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
