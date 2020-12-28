<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifierScoreUnitaireTablesBalleMarque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->dropColumn('balle_marqué');
        });

        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->integer('balle_marque')->default('0') ;
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
