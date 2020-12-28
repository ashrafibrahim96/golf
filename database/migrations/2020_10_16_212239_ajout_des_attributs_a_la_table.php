<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutDesAttributsALaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('score_unitaires', function (Blueprint $table) {
            $table->float('Eagle_pourcentage')->nullable()->default(0) ;
            $table->float('Tripple Bogey_pourcentage')->nullable()->default(0) ;
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
