<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelScoreUnitairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_unitaires', function (Blueprint $table) {
            $table->id();
            $table->integer('score_id')->unsigned()->nullable() ;
            $table->foreign('score_id')->references('id')->on('scores') ;
            $table->boolean('balle_marqué') ;
            $table->integer('strokes') ;
            $table->integer('putts') ;
            $table->integer('chips') ;
            $table->integer('SandShots') ;
            $table->integer('penalties') ;
            $table->integer('baton_id')->unsigned()->nullable() ;
            $table->foreign('baton_id')->references('id')->on('batons') ;
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
        Schema::dropIfExists('model_score_unitaires');
    }
}
