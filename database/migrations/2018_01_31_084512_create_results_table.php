<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('result_id')->unsigned();
            $table->boolean('disqualified')->nullable();
            $table->integer('result_time');

            $table->integer('result_athlete')->unsigned();
            $table->integer('result_competition')->unsigned();
            $table->integer('result_distance')->unsigned();
            $table->integer('result_sport')->unsigned();
            $table->integer('result_multisport')->unsigned()->nullable();

            $table->foreign('result_athlete')->references('id')->on('users');
            $table->foreign('result_competition')->references('comp_id')->on('competitions');
            $table->foreign('result_distance')->references('distance_id')->on('distances');
            $table->foreign('result_sport')->references('sport_id')->on('sports');
            $table->foreign('result_multisport')->references('sport_id')->on('sports');

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
        Schema::dropIfExists('results');
    }
}
