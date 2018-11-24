<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('comp_id')->unsigned();
            $table->string('comp_name');
            $table->string('comp_location');
            $table->dateTime('comp_date');

            $table->integer('comp_promoter')->unsigned();
            $table->integer('comp_sport')->unsigned();

            $table->foreign('comp_promoter')->references('id')->on('users');
            $table->foreign('comp_sport')->references('sport_id')->on('sports');

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
        Schema::dropIfExists('competitions');
    }
}
