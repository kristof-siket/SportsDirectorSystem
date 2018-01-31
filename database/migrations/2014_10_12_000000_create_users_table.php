<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('email')->unique();
                $table->string('password');

                $table->string('first_name');
                $table->string('last_name');
                $table->date('date_of_birth')->nullable();
                $table->string('location')->nullable();

                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('teams')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('team_id')->unsigned();

                $table->foreign('team_id')->references('team_id')->on('teams');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
