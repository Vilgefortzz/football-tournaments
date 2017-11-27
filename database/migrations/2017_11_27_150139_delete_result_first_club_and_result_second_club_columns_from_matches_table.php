<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteResultFirstClubAndResultSecondClubColumnsFromMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn(['result_first_club', 'result_second_club']);
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
            $table->integer('result_first_club')->unsigned()->default(0);
            $table->integer('result_second_club')->unsigned()->default(0);
        });
    }
}
