<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePointsToTournamentPointsInTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            DB::statement('ALTER TABLE tournaments CHANGE points tournament_points INTEGER NOT NULL');
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
            DB::statement('ALTER TABLE tournaments CHANGE tournament_points points INTEGER NOT NULL');
        });
    }
}
