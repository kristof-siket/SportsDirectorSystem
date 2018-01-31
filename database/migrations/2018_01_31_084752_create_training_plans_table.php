<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_plans', function (Blueprint $table) {
            $table->increments('tp_id')->unsigned();
            $table->string('tp_name');
            $table->longText('tp_desc')->nullable();
            $table->string('tp_filepath')->nullable();

            $table->integer('tp_creator')->unsigned();
            $table->integer('tp_sport')->unsigned();
            $table->integer('tp_distance')->unsigned();
            $table->integer('tp_level')->unsigned();

            $table->foreign('tp_creator')->references('id')->on('users');
            $table->foreign('tp_sport')->references('sport_id')->on('sports');
            $table->foreign('tp_distance')->references('distance_id')->on('distances');
            $table->foreign('tp_level')->references('level_id')->on('levels');

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
        Schema::dropIfExists('training_plans');
    }
}
