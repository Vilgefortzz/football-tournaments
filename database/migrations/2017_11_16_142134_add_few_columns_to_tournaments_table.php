<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFewColumnsToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->integer('tournament_points')->unsigned()->after('city');
            $table->integer('number_of_occupied_seats')->unsigned()->default(0)
                ->after('number_of_seats');
            $table->integer('number_of_available_seats')->unsigned()->after('number_of_occupied_seats');
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
            $table->dropColumn(['tournament_points', 'number_of_occupied_seats', 'number_of_available_seats']);
        });
    }
}
