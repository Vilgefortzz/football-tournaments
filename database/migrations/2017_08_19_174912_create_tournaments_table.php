<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('start_date_and_time');
            $table->dateTime('end_date_and_time');
            $table->string('country');
            $table->string('city');
            $table->integer('points');
            $table->integer('number_of_seats');
            $table->integer('number_of_occupied_seats')->default(0);
            $table->integer('number_of_available_seats');
            $table->enum('game_system', ['group', 'random - winner stays', 'everyone with each other']);
            $table->string('prize_first_place')->default('-');
            $table->string('prize_second_place')->default('-');
            $table->string('prize_third_place')->default('-');
            $table->enum('status', ['open', 'close'])->default('open');
            $table->integer('goals')->unsigned()->default(0);
            $table->integer('assists')->unsigned()->default(0);
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
        Schema::dropIfExists('tournaments');
    }
}
