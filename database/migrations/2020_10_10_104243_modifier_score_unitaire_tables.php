<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifierScoreUnitaireTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->dropColumn('strokes');

        });
        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->dropColumn('penalties');

        });
        Schema::table('score_unitaires', function (Blueprint $table) {
            $table->boolean('penalties')->default('false') ;
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
