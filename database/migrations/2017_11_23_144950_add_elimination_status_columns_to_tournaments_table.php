<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEliminationStatusColumnsToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->integer('in_game_clubs')->unsigned()->default(0)
                ->after('number_of_available_seats');
            $table->integer('eliminated_clubs')->unsigned()->default(0)
                ->after('in_game_clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropColumn(['in_game_clubs', 'eliminated_clubs']);
        });
    }
}
