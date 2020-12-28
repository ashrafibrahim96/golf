<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_matche') ;
            $table->integer('match_id')->unsigned()->nullable() ;
            $table->foreign('match_id')->references('id')->on('matches') ;
            $table->integer('user_id')->unsigned()->nullable() ;
            $table->foreign('user_id')->references('id')->on('users') ;
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
