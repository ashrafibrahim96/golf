<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('valeur')->nullable();
            $table->integer('user_id')->unsigned()->nullable() ;
            $table->foreign('user_id')->references('id')->on('users') ;
            $table->integer('partie_id')->unsigned()->nullable() ;
            $table->foreign('partie_id')->references('id')->on('parties') ;
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
        Schema::dropIfExists('model_scores');
    }
}
