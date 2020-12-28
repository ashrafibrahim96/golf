<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batons', function (Blueprint $table) {
            $table->id();
            $table->string('marque') ;
            $table->string('photo') ;
            $table->string('nom') ;
            $table->boolean('favori') ;
            $table->integer('distance') ;
            $table->timestamps();
        });


        Schema::create('tees', function (Blueprint $table) {
            $table->id();
            $table->string('marque') ;
            $table->string('photo') ;
            $table->integer('hauteur') ;
            $table->timestamps();
        });

        Schema::create('balles', function (Blueprint $table) {
            $table->id();
            $table->string('marque') ;
            $table->string('photo') ;
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
        Schema::dropIfExists('balles');
        Schema::dropIfExists('batons');
        Schema::dropIfExists('tees');

    }
}
