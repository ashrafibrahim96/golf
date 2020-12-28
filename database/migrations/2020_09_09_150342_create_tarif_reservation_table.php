<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_reservation', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_id')->unsigned()->nullable() ;
            $table->foreign('reservation_id')->references('id')->on('reservations') ;
            $table->integer('location_id')->unsigned()->nullable() ;
            $table->foreign('location_id')->references('id')->on('locations') ;
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
        Schema::dropIfExists('tarif_reservation');
    }
}
