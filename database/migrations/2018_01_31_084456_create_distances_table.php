<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->increments('distance_id')->unsigned();
            $table->string('distance_name')->nullable();
            $table->float('distance_kilometers')->unsigned();

            $table->integer('sport_id')->unsigned();
            $table->integer('multi_id')->unsigned()->nullable(); // ha multisporthoz tartozik

            $table->foreign('sport_id')->references('sport_id')->on('sports');
            $table->foreign('multi_id')->references('sport_id')->on('sports');

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
        Schema::dropIfExists('distances');
    }
}
