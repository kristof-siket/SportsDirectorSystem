<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyzerResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyzer_results', function (Blueprint $table) {
            $table->increments('aresult_id');
            $table->integer('aresult_result')->unsigned();
            $table->float('aresult_timestamp')->unsigned();
            $table->float('aresult_kilometers')->unsigned();
            $table->float('aresult_pulse')->unsigned();

            $table->foreign('aresult_result')->references('result_id')->on('results');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyzer_results');
    }
}
