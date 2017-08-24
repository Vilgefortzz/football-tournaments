<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_tournament', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id')->unsigned()->index();
            $table->integer('tournament_id')->unsigned()->index();

            $table->foreign('club_id')->references('id')->on('clubs')
                ->onDelete('cascade');

            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onDelete('cascade');

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
        Schema::dropIfExists('club_tournament');
    }
}
