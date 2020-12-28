<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutDesAttributsALaTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telephone');
            $table->string('photo')->nullable() ;
            $table->string('handicap')->default(36) ;
            $table->enum('sexe', ['homme', 'femme']); ;
            $table->date('dateDeNaissance') ;
            $table->integer('boiteATee_id')->unsigned()->nullable() ;
            $table->foreign('boiteATee_id')->references('id')->on('boiteATee') ;

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
