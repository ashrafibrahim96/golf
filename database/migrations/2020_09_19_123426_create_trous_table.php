<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trous', function (Blueprint $table) {
            $table->id();
            $table->integer('numero') ;
            $table->integer('par') ;
            $table->integer('strokeIndex') ;
            $table->integer('distance_trou_blanc') ;
            $table->integer('distance_trou_bleu') ;
            $table->integer('distance_trou_rouge') ;
            $table->integer('distance_trou_jaune') ;
            $table->text('GPS') ;
            $table->string('image2D') ;
            $table->integer('parcour_id')->unsigned()->nullable() ;
            $table->foreign('parcour_id')->references('id')->on('parcours') ;
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
        Schema::dropIfExists('trous');
    }
}
