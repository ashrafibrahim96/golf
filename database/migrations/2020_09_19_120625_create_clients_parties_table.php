<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_partie', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable() ;
            $table->foreign('user_id')->references('id')->on('users') ;
            $table->integer('partie_id')->unsigned()->nullable() ;
            $table->foreign('partie_id')->references('id')->on('parties') ;
            $table->integer('classement') ;
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
        Schema::dropIfExists('clients_parties');
    }
}
