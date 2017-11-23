<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewStartDateAndTimeAndEndDateAndTimeColumnsToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dateTime('start_date_and_time')->nullable()->after('id');
            $table->dateTime('end_date_and_time')->nullable()->after('start_date_and_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn(['start_date_and_time', 'end_date_and_time']);
        });
    }
}
