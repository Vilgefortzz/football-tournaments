<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteCascadeToClubIdColumnInTrophiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trophies', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->foreign('club_id')->references('id')->on('clubs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trophies', function (Blueprint $table) {
            $table->foreign('club_id')->references('id')->on('clubs');
        });
    }
}
