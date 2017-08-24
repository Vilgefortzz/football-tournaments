<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('logo')->default('logo_club_default.jpg');
            $table->string('founded_by')->unique();
            $table->integer('number_of_footballers')->unsigned()->default(1);
            $table->integer('tournament_points')->unsigned()->default(0);
            $table->integer('played_matches')->unsigned()->default(0);
            $table->integer('completed_tournaments')->unsigned()->default(0);
            $table->integer('won_matches')->unsigned()->default(0);
            $table->integer('won_tournaments')->unsigned()->default(0);
            $table->integer('won_trophies')->unsigned()->default(0);
            $table->integer('matches_win_rate')->unsigned()->default(0);
            $table->integer('tournaments_win_rate')->unsigned()->default(0);
            $table->integer('trophies_win_rate')->unsigned()->default(0);
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
        Schema::dropIfExists('clubs');
    }
}
