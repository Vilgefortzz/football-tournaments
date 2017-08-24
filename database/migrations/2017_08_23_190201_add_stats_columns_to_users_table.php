<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatsColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('goals')->unsigned()->default(0)->after('password');
            $table->integer('assists')->unsigned()->default(0)->after('goals');
            $table->integer('number_of_clubs')->unsigned()->default(0)->after('assists');
            $table->integer('number_of_contracts')->unsigned()->default(0)->after('number_of_clubs');
            $table->integer('played_matches')->unsigned()->default(0)->after('number_of_contracts');
            $table->integer('completed_tournaments')->unsigned()->default(0)->after('played_matches');
            $table->integer('won_matches')->unsigned()->default(0)->after('completed_tournaments');
            $table->integer('won_tournaments')->unsigned()->default(0)->after('won_matches');
            $table->integer('won_trophies')->unsigned()->default(0)->after('won_tournaments');
            $table->integer('matches_win_rate')->unsigned()->default(0)->after('won_trophies');
            $table->integer('tournaments_win_rate')->unsigned()->default(0)->after('matches_win_rate');
            $table->integer('trophies_win_rate')->unsigned()->default(0)->after('tournaments_win_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('goals');
            $table->dropColumn('assists');
            $table->dropColumn('number_of_clubs');
            $table->dropColumn('number_of_contracts');
            $table->dropColumn('played_matches');
            $table->dropColumn('completed_tournaments');
            $table->dropColumn('won_matches');
            $table->dropColumn('won_tournaments');
            $table->dropColumn('won_trophies');
            $table->dropColumn('matches_win_rate');
            $table->dropColumn('tournaments_win_rate');
            $table->dropColumn('trophies_win_rate');
        });
    }
}
