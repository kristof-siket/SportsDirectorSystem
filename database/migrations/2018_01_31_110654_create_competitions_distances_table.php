<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions_distances', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('competition_id')->unsigned();
            $table->integer('distance_id')->unsigned();

            $table->foreign('competition_id')->references('comp_id')->on('competitions');
            $table->foreign('distance_id')->references('distance_id')->on('distances');

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
        Schema::dropIfExists('competitions_distances');
    }
}
