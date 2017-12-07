<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewPrizesColumnsToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->string('prize_first_place')->nullable()->after('status');
            $table->string('prize_second_place')->nullable()->after('prize_first_place');
            $table->string('prize_third_place')->nullable()->after('prize_second_place');
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
            $table->dropColumn(['prize_first_place', 'prize_second_place', 'prize_third_place']);
        });
    }
}
