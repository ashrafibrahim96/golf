<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelStatistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_statistiques', function (Blueprint $table) {
            $table->id();
            $table->float('fairway') ;
            $table->float('gir') ;
            $table->float('puts') ;
            $table->float('ss') ;
            $table->float('diving_accuracy') ;
            $table->float('sandSaves') ;
            $table->timestamps();
        });

        schema::table('user_partie', function (Blueprint $table) {
            $table->float('birdie_pourcentage')->nullable()->default(0) ;
            $table->float('par_pourcentage')->nullable()->default(0) ;
            $table->float('holeInOne_pourcentage')->nullable()->default(0) ;
            $table->float('DoubleBogey_pourcentage')->nullable()->default(0) ;
            $table->float('Bogey_pourcentage')->nullable()->default(0) ;
            $table->float('albatros_pourcentage')->nullable()->default(0) ;

        });

        Schema::table('user_partie', function (Blueprint $table) {
            $table->renameColumn('classement', 'handicap');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_statistiques');
    }
}
